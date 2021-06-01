<?php
include "checksession.php";
require '../../../config/conn.php';
require '../../../vendor/autoload.php';
use Aws\S3\S3Client;

define('S3KEY', 'DVBMBX4CWPXPZ7LU75FW');
define('S3SECRECT', 'Wc8v38wFH9KBjUINQsutsu00jGY+wiwgEi1I/3MTVXQ');
define('S3BUCKET', 'ct21');

//function names
$funcArr = [
    'getApplications',
];

if (isset($_REQUEST['op']) && is_numeric($_REQUEST['op'])) {
    $op = $_REQUEST['op'];
} else {
    $op = 0;
}

if ($op < 0 || $op >= count($funcArr)) {
    die('Invalid param');
}

call_user_func($funcArr[$op]);

function getApplications()
{
    global $conn;

    $client = new S3Client([
        'version' => 'latest',
        'region' => 'sgp1',
        'endpoint' => 'https://sgp1.digitaloceanspaces.com',
        'credentials' => [
            'key' => S3KEY,
            'secret' => S3SECRECT,
        ],
    ]);
    $limit = empty($_POST['limit']) ? "0" : $_POST['limit'];
    $offset = empty($_POST['offset']) ? "0" : $_POST['offset'];
    $orderName = 'id';
    $sortOrder = " DESC ";
    if (!empty($_REQUEST['sort'])) {
        $orderName = $_REQUEST['sort'];
        if ($orderName == 'field') {
            $orderName = 'field_id_c';
        }
    }

    if (!empty($_REQUEST['order'])) {
        $sortOrder = strtoupper($_REQUEST['order']);
    }
    $sql = "SELECT a.id,
                  a.name,
                  a.birth,
                  a.comment,
                  a.phone,
                  l.`level`,
                  l.grade,
                  a.apply_time,
                  a.ielts,
                  a.passport_photo AS `passport`,
                  a.graduated_photo AS `graduated`,
                  a.diploma_photo AS `diploma`,
                  a.scoresheet_photo AS `scoresheet`,
                  a.ielts_photo AS `ielts_photo`,
                  i.name AS `institution`,
                  c.name AS `course`
        FROM `application` a
        LEFT JOIN institution i ON i.id = a.inst_id
        LEFT JOIN course c ON c.id = a.c_id
        LEFT JOIN app_level l ON l.id = a.entry_level
        ORDER BY $orderName $sortOrder, c.id DESC
        LIMIT $offset, $limit ;";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as &$r) {
        if (!empty($r['passport'])) {
            $cmd = $client->getCommand('GetObject', [
                'Bucket' => S3BUCKET,
                'Key' => $r['passport'],
            ]);
            $request = $client->createPresignedRequest($cmd, '+15 minutes');
            $r['passport'] = (string) $request->getUri();
        }

        if (!empty($r['graduated'])) {
            $cmd = $client->getCommand('GetObject', [
                'Bucket' => S3BUCKET,
                'Key' => $r['graduated'],
            ]);
            $request = $client->createPresignedRequest($cmd, '+15 minutes');
            $r['graduated'] = (string) $request->getUri();
        }

        if (!empty($r['diploma'])) {
            $cmd = $client->getCommand('GetObject', [
                'Bucket' => S3BUCKET,
                'Key' => $r['diploma'],
            ]);
            $request = $client->createPresignedRequest($cmd, '+15 minutes');
            $r['diploma'] = (string) $request->getUri();
        }

        if (!empty($r['scoresheet'])) {
            $cmd = $client->getCommand('GetObject', [
                'Bucket' => S3BUCKET,
                'Key' => $r['scoresheet'],
            ]);
            $request = $client->createPresignedRequest($cmd, '+15 minutes');
            $r['scoresheet'] = (string) $request->getUri();
        }

        if (!empty($r['ielts_photo'])) {
            $cmd = $client->getCommand('GetObject', [
                'Bucket' => S3BUCKET,
                'Key' => $r['ielts_photo'],
            ]);
            $request = $client->createPresignedRequest($cmd, '+15 minutes');
            $r['ielts_photo'] = (string) $request->getUri();
        }
    }
    echo json_encode(["total" => count($result), "rows" => $result], JSON_UNESCAPED_UNICODE);

}
