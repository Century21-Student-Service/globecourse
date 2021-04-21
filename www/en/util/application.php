<?php
require_once '../../../config/conn.php';
require_once '../../../vendor/autoload.php';

define('S3KEY', 'DVBMBX4CWPXPZ7LU75FW');
define('S3SECRECT', 'Wc8v38wFH9KBjUINQsutsu00jGY+wiwgEi1I/3MTVXQ');
define('S3BUCKET', 'ct21');
define('S3ENDPOINT', 'https://sgp1.digitaloceanspaces.com');
use Aws\S3\MultipartUploader;
use Aws\S3\S3Client;

//function names
$funcArr = [
    'getEntryLevels',
    'uploadPhoto',
    'saveApplication',
    'getCourseName',
];

$op = 0;

if (isset($_REQUEST['op'])) {
    $op = $_REQUEST['op'];
} else {
    $op = 0;
}

if (is_numeric($op)) {
    if ($op < 0 || $op >= count($funcArr)) {
        die('Invalid param');
    }
    call_user_func($funcArr[$op]);
} else {
    if (!in_array($op, $funcArr)) {
        die('Invalid param');
    }
    call_user_func($op);
}
function getEntryLevels()
{
    global $conn;
    $result = [];
    $sql = "SELECT `level_en` AS `level`, `grade_en` AS `grade`,`level_code` AS `code` FROM app_level ORDER BY code;";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $r) {
        $level = $r['level'];
        unset($r['level']);
        if (empty($result[$level])) {
            $result[$level] = [];
        }
        array_push($result[$level], $r);
    }
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}

function uploadPhoto()
{
    // print_r($_FILES);die;
    $client = new Aws\S3\S3Client([
        'version' => 'latest',
        'region' => 'sgp1',
        'endpoint' => S3ENDPOINT,
        'credentials' => [
            'key' => S3KEY,
            'secret' => S3SECRECT,
        ],
    ]);
    $source = $_FILES['fileupload']['tmp_name'];
    $mime = 'image/jpeg';
    $extension = ".jpg";
    $finfo = finfo_open(FILEINFO_MIME_TYPE); // 返回 mime 类型
    @$mime = finfo_file($finfo, $source);
    finfo_close($finfo);
    preg_match('/\/(gif|png|jpg|jpeg|pdf)$/', $mime, $matches);

    if (empty($matches)) {
        // error_log("Unknown file type - ");
        echo json_encode(['code' => -2, 'msg' => 'Unaccpted format, please upload file with format of jpg/png/gif/pdf.'], JSON_UNESCAPED_UNICODE);
        die;
    }

    if ($matches[1] == 'jpeg') {
        $extension = ".jpg";
    } else {
        $extension = "." . $matches[1];
    }
    $uuid = Ramsey\Uuid\Uuid::uuid4();
    $key = 'globecourse/' . str_replace("-", "", $uuid->toString()) . $extension;

    // echo $mime;die;

    $uploader = new MultipartUploader($client, $source, [
        'bucket' => S3BUCKET,
        'key' => $key,
        'params' => ['ContentType' => $mime],
    ]);

    try {
        $result = $uploader->upload();
        if ($extension == '.pdf') {
            $img = new imagick($source);
            $img->setImageFormat('jpg');
            $imgBuff = $img->getimageblob();
            $img->clear();
            echo json_encode(['code' => 0, 'msg' => $key, 'img' => base64_encode($imgBuff)], JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(['code' => 0, 'msg' => $key], JSON_UNESCAPED_UNICODE);
        }
    } catch (MultipartUploadException $e) {
        echo json_encode(['code' => -1, 'msg' => $e->getMessage()], JSON_UNESCAPED_UNICODE);
    }
}

function getCourseName()
{
    $cid = $_REQUEST['cid'];
    global $conn;
    $sql = "SELECT c.id,c.name_en AS `course`, c.inst_id, i.name_en AS `institution` FROM course c LEFT JOIN institution i ON c.inst_id = i.id WHERE c.id = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$cid]);
    echo json_encode(['code' => 0, 'course' => $stmt->fetch(PDO::FETCH_ASSOC)], JSON_UNESCAPED_UNICODE);
}

function saveApplication()
{
    $data = json_decode(file_get_contents("php://input"), true);
    if (!$data) {
        echo json_encode(['code' => -1, 'msg' => 'Illegal Inputs'], JSON_UNESCAPED_UNICODE);
        die;
    }
    global $conn;
    $sql = "INSERT INTO `application` (
                            `name`,
                            `birth`,
                            `address`,
                            `phone`,
                            `email`,
                            `entry_level`,
                            `entry_inst`,
                            `ielts`,
                            `passport_photo`,
                            `graduated_photo`,
                            `diploma_photo`,
                            `scoresheet_photo`,
                            `ielts_photo`,
                            `inst_id`,
                            `c_id`,
                            `lang`
                            )VALUES(
                            :name,
                            :birth,
                            '',
                            :phone,
                            :email,
                            :entry_level,
                            :entry_inst,
                            :ielts,
                            :img_passport,
                            :img_graduated,
                            :img_diploma,
                            :img_scoresheet,
                            :img_ielts,
                            :inst_id,
                            :course_id,
                            :lang
                            );";
    $stmt = $conn->prepare($sql);
    // echo json_encode($data, JSON_UNESCAPED_UNICODE);
    // die;

    try {
        $stmt->execute($data);
        echo json_encode(['code' => 0, 'msg' => 'Success'], JSON_UNESCAPED_UNICODE);
    } catch (Exception $e) {
        echo json_encode(['code' => -1, 'msg' => $e->getMessage()], JSON_UNESCAPED_UNICODE);
    }
}
