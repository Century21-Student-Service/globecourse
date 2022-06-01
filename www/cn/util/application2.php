<?php
require_once '../../../config/conn.php';
require_once '../../../vendor/autoload.php';

define('S3KEY', 'DVBMBX4CWPXPZ7LU75FW');
define('S3SECRECT', 'Wc8v38wFH9KBjUINQsutsu00jGY+wiwgEi1I/3MTVXQ');
define('S3BUCKET', 'ct21');
define('S3ENDPOINT', 'https://sgp1.digitaloceanspaces.com');
use Aws\S3\MultipartUploader;
use Aws\S3\S3Client;
use PHPMailer\PHPMailer\PHPMailer;

testEmail();
exit();
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
    $sql = "SELECT `level`,`grade`,`level_code` AS `code` FROM app_level ORDER BY code;";
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
        echo json_encode(['code' => -2, 'msg' => '文件格式错误，请上传jpg/png/gif/pdf类型的文件'], JSON_UNESCAPED_UNICODE);
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
    $sql = "SELECT c.id,c.name AS `course`, c.inst_id, i.name AS `institution` FROM course c LEFT JOIN institution i ON c.inst_id = i.id WHERE c.id = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$cid]);
    echo json_encode(['code' => 0, 'course' => $stmt->fetch(PDO::FETCH_ASSOC)], JSON_UNESCAPED_UNICODE);
}

function testEmail(){
	$sql = "SELECT a.id,
	a.name,
	a.birth,
	a.comment,
	a.address,
	a.phone,
	a.email,
	a.entry_inst,
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
	where a.id = 19;";
	
	$row = $dosql->GetOne($sql);
	
	$html = '<table class="table">';
	$html .= "<tr><td width='200px'>申请时间：</td><td>{$row['apply_time']}</td></tr>";
	$html .= "<tr><td>申请人姓名：</td><td>{$row['name']}</td></tr>";
	$html .= "<tr><td>出生年月：</td><td>{$row['birth']}</td></tr>";
	$html .= "<tr><td>联系电话：</td><td>{$row['phone']}</td></tr>";
	$html .= "<tr><td>电子邮件：</td><td>{$row['email']}</td></tr>";
	$html .= "<tr><td>申请院校：</td><td>{$row['institution']}</td></tr>";
	$html .= "<tr><td>申请课程：</td><td>{$row['course']}</td></tr>";
	$html .= "<tr><td>最高学历或在读年级：</td><td>{$row['level']} {$row['grade']}</td></tr>";
	$html .= "<tr><td>毕业或在读院校：</td><td>{$row['entry_inst']}</td></tr>";
	$html .= "<tr><td>雅思分数：</td><td>{$row['ielts']}</td></tr>";
	$html .= "<tr><td>备注：</td><td>" . nl2br($row['comment']). "</td></tr>";
	
	$html .= "<tr><td>护照：</td><td>";
	if ($row['passport'] != ''){
		$html .= "<a target='_blank' href='{$row['passport']}' >点击查看</a>";
	}
	$html .= "</td></tr>";
	$html .= "<tr><td>学历毕业证书：</td><td>";
	if ($row['passport'] != ''){
		$html .= "<a target='_blank' href='{$row['graduated']}' >点击查看</a>";
	}
	$html .= "</td></tr>";
	$html .= "<tr><td>学位证：</td><td>";
	if ($row['passport'] != ''){
		$html .= "<a target='_blank' href='{$row['diploma']}' >点击查看</a>";
	}
	$html .= "</td></tr>";
	$html .= "<tr><td>毕业成绩单：</td><td>";
	if ($row['passport'] != ''){
		$html .= "<a target='_blank' href='{$row['scoresheet']}' >点击查看</a>";
	}
	$html .= "</td></tr>";
	$html .= "<tr><td>雅思成绩单：</td><td>";
	if ($row['passport'] != ''){
		$html .= "<a target='_blank' href='{$row['ielts_photo']}' >点击查看</a>";
	}
	$html .= "</td></tr>";
	$html .= '</table>';
	
	$mail = new PHPMailer();
	try {
		//Server settings
		//$mail->SMTPDebug = \PHPMailer\PHPMailer\SMTP::DEBUG_SERVER;
		
		$mail->isSMTP();                                            // Send using SMTP
		$mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
		$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		$mail->Username   = 'noreplyglobalcourse@gmail.com';                     // SMTP username
		$mail->Password   = 'Global2022';                               // SMTP password
		
		$mail->SMTPSecure = 'ssl';
		$mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
	
		$mail->CharSet    = 'UTF-8';
		$mail->Encoding   = 'base64';
		//Recipients
		$mail->setFrom('noreplyglobalcourse@gmail.com');
		$mail->addAddress('361231134@qq.com');     // Add a recipient
		//$mail->addAddress('ellen@example.com');               // Name is optional
		//$mail->addReplyTo('info@example.com', 'Information');
		//$mail->addCC('cc@example.com');
		//$mail->addBCC('bcc@example.com');
		
		
	
		 $mail->isHTML(true);                                  // Set email format to HTML
		 $mail->Subject = '新的课程申请';
		 $mail->Body    = $html;
		 
		
		 $result = $mail->send();
		 
		echo 'Message has been sent';
	} catch (\Exception $e) {
		echo "Message could not be sent. Mailer Error: {$e->ErrorInfo}";
	}
	
	
}

function saveApplication()
{
    $data = json_decode(file_get_contents("php://input"), true);
    if (!$data) {
        echo json_encode(['code' => -1, 'msg' => '提交的数据不合法'], JSON_UNESCAPED_UNICODE);
        die;
    }
    global $conn;
    $sql = "INSERT INTO `application` (
                            `name`,
                            `birth`,
                            `address`,
                            `comment`,
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
                            :comment,
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
        echo json_encode(['code' => 0, 'msg' => '成功'], JSON_UNESCAPED_UNICODE);
    } catch (Exception $e) {
        echo json_encode(['code' => -1, 'msg' => $e->getMessage()], JSON_UNESCAPED_UNICODE);
    }
}
