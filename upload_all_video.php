<?php

require 'vendor/autoload.php';
require 'config/conn.php';

define('S3KEY', 'DVBMBX4CWPXPZ7LU75FW');
define('S3SECRECT', 'Wc8v38wFH9KBjUINQsutsu00jGY+wiwgEi1I/3MTVXQ');
define('S3BUCKET', 'ct21');
define('S3ENDPOINT', 'https://sgp1.digitaloceanspaces.com');
use Aws\S3\MultipartUploader;
use Aws\S3\S3Client;

$client = new Aws\S3\S3Client([
    'version' => 'latest',
    'region' => 'sgp1',
    'endpoint' => S3ENDPOINT,
    'credentials' => [
        'key' => S3KEY,
        'secret' => S3SECRECT,
    ],
]);

$sql_update = "UPDATE institution SET video=? WHERE id=?";
$stmt_update = $conn->prepare($sql_update);

$sql = "SELECT id,video from institution where id>13 AND video<>'';";
$stmt = $conn->prepare($sql);
$stmt->execute();

$sql_check = "SELECT id FROM upload_video WHERE `name` = ?";
$stmt_check = $conn->prepare($sql_check);

$sql_insert = "INSERT INTO upload_video(`name`,`size`,`duration`,`width`,`height`,`path`) VALUES (:name, :size, :duration,:width,:height,:path);";
$stmt_insert = $conn->prepare($sql_insert);

foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $r) {
    echo $r['id'] . "\t";
    $source_video = 'www' . $r['video'];
    $file_size = filesize($source_video);
    $finfo = finfo_open(FILEINFO_MIME_TYPE); // 返回 mime 类型
    @$mime = finfo_file($finfo, $source_video);
    finfo_close($finfo);
    if ($mime) {
        preg_match('/\/(mp4|mpg|avi|wmv|mpeg)$/', $mime, $matches);
        $extension = "." . $matches[1];

        do {
            $uuid = Ramsey\Uuid\Uuid::uuid4();
            $name = str_replace("-", "", $uuid->toString()) . $extension;
            $stmt_check->execute([$name]);
        } while ($stmt_check->fetch());
        $source_img = '/tmp/' . str_replace("-", "", $uuid->toString()) . '.jpg';
        echo $name . "\t";
        $ffmpeg = FFMpeg\FFMpeg::create();
        $video = $ffmpeg->open($source_video);
        $video
            ->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(10))
            ->save($source_img);
        list($width, $height) = getimagesize($source_img);
        if ($width > 640) {
            $imgResized = imagescale(imagecreatefromjpeg($source_img), 640, 360);
            imagejpeg($imgResized, $source_img);
            imagedestroy($imgResized);
        }
        $ffprobe = FFMpeg\FFProbe::create();
        $video = $ffprobe->streams($source_video)->videos()->first();
        $height = $video->getDimensions()->getHeight();
        $width = $video->getDimensions()->getWidth();
        $duration = round($video->get('duration'));
        $param = ['name' => $name, 'path' => 'globecourse/video/' . $name, 'size' => $file_size, 'duration' => $duration, 'width' => $width, 'height' => $height];
        $stmt_insert->execute($param);
        $param['id'] = $conn->lastInsertId();

        $uploader_video = new MultipartUploader($client, $source_video, [
            'bucket' => S3BUCKET,
            'key' => $param['path'],
            'params' => ['ContentType' => $mime],
        ]);

        $uploader_image = new MultipartUploader($client, $source_img, [
            'bucket' => S3BUCKET,
            'key' => preg_replace('/\.[\d\w]{3}$/', '.jpg', $param['path']),
            'params' => ['ContentType' => 'image/jpeg'],
        ]);
        try {
            $uploader_video->upload();
            $uploader_image->upload();
            $stmt_update->execute([$param['id'], $r['id']]);
            echo 'DONE' . PHP_EOL;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

die;
$finfo = finfo_open(FILEINFO_MIME_TYPE); // 返回 mime 类型
echo finfo_file($finfo, 'www/uploads/image/20210402/1617283003_2021.jpg');
finfo_close($finfo);
