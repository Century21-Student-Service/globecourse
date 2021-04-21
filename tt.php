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

$sql = "SELECT id,video from institution where id=9;";
$stmt = $conn->prepare($sql);
$stmt->execute();
foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $r) {
    $source_video = 'www' . $r['video'];
    $finfo = finfo_open(FILEINFO_MIME_TYPE); // 返回 mime 类型
    @$mime = finfo_file($finfo, $source_video);
    finfo_close($finfo);
    if ($mime) {
        preg_match('/\/(mp4|mpg|avi|wmv|mpeg)$/', $mime, $matches);
        $extension = "." . $matches[1];
        $uuid = Ramsey\Uuid\Uuid::uuid4();
        $key_video = 'globecourse/video/' . str_replace("-", "", $uuid->toString()) . $extension;
        $key_img = 'globecourse/video/' . str_replace("-", "", $uuid->toString()) . '.jpg';
        $source_img = '/tmp/' . str_replace("-", "", $uuid->toString()) . '.jpg';
        while ($client->doesObjectExist(S3BUCKET, $key_video)) {
            $uuid = Ramsey\Uuid\Uuid::uuid4();
            $key_video = 'globecourse/video/' . str_replace("-", "", $uuid->toString()) . $extension;
            $key_img = 'globecourse/video/' . str_replace("-", "", $uuid->toString()) . '.jpg';
            $source_img = '/tmp/' . str_replace("-", "", $uuid->toString()) . '.jpg';
        }

        $ffmpeg = FFMpeg\FFMpeg::create();
        $video = $ffmpeg->open($source_video);
        $video
            ->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(10))
            ->save($source_img);

        $uploader_video = new MultipartUploader($client, $source_video, [
            'bucket' => S3BUCKET,
            'key' => $key_video,
            'params' => ['ContentType' => $mime],
        ]);

        $uploader_image = new MultipartUploader($client, $source_img, [
            'bucket' => S3BUCKET,
            'key' => $key_img,
            'params' => ['ContentType' => 'image/jpeg'],
        ]);
        try {
            $uploader_video->upload();
            $uploader_image->upload();
            $arr = [['title' => '', 'video' => $key_video, 'img' => $key_img]];
            $stmt_update->execute([json_encode($arr), $r['id']]);
            echo 'DONE';
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

die;
$ffmpeg = FFMpeg\FFMpeg::create();
$video = $ffmpeg->open('www/uploads/media/20210409/1617975363_5431.mp4');
$video
    ->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(10))
    ->save('frame.jpg');

die;
$finfo = finfo_open(FILEINFO_MIME_TYPE); // 返回 mime 类型
echo finfo_file($finfo, 'www/uploads/image/20210402/1617283003_2021.jpg');
finfo_close($finfo);
