<?php
//error_log(date('Y-m-d H:i:s', time()) . "\ttesting here", 3, '/var/log/php_error.log');
error_log("aaaaa");
die;
require 'vendor/autoload.php';
require 'config/conn.php';

define('S3KEY', 'DVBMBX4CWPXPZ7LU75FW');
define('S3SECRECT', 'Wc8v38wFH9KBjUINQsutsu00jGY+wiwgEi1I/3MTVXQ');
define('S3BUCKET', 'ct21');
define('S3ENDPOINT', 'https://sgp1.digitaloceanspaces.com');
use Aws\S3\MultipartUploader;
use Aws\S3\S3Client;
use GuzzleHttp\Promise;

$client = new Aws\S3\S3Client([
    'version' => 'latest',
    'region' => 'sgp1',
    'endpoint' => S3ENDPOINT,
    'credentials' => [
        'key' => S3KEY,
        'secret' => S3SECRECT,
    ],
]);
$sync = [];
$video_to_upload = [71, 72, 79, 82, 101, 102, 103, 104];
$uids = str_repeat('?,', count($video_to_upload) - 1) . '?';
$sql_upload_get = "SELECT id,`name` FROM upload_video WHERE `status` = 0 AND id IN($uids);";
$stmt_upload_get = $conn->prepare($sql_upload_get);
$stmt_upload_get->execute($video_to_upload);
$uploads = $stmt_upload_get->fetchAll(PDO::FETCH_ASSOC);
$sql_upload_update = "UPDATE upload_video SET `path`=CONCAT('globecourse/video/',`name`), `status`=1 WHERE id IN($uids);";
$stmt_upload_update = $conn->prepare($sql_upload_update);
$stmt_upload_update->execute($video_to_upload);
foreach ($uploads as $u) {
    array_push($sync,
        (new MultipartUploader($client, '/tmp/' . $u['name'], [
            'bucket' => S3BUCKET,
            'key' => 'globecourse/video/' . $u['name'],
        ]))->promise(),
        (new MultipartUploader($client, '/tmp/' . preg_replace('/\.[\w\d]{3}$/', '.jpg', $u['name']), [
            'bucket' => S3BUCKET,
            'key' => 'globecourse/video/' . preg_replace('/\.[\w\d]{3}$/', '.jpg', $u['name']),
        ]))->promise()
    );
}
$results = Promise\unwrap($sync);
file_put_contents('oo.txt', json_encode($results, JSON_UNESCAPED_UNICODE));
