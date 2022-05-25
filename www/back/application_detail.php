<?php include "util/checksession.php";

require_once dirname(__FILE__) . './../include/config.inc.php';
require '../../config/conn.php';
require '../../vendor/autoload.php';
use Aws\S3\S3Client;

define('S3KEY', 'DVBMBX4CWPXPZ7LU75FW');
define('S3SECRECT', 'Wc8v38wFH9KBjUINQsutsu00jGY+wiwgEi1I/3MTVXQ');
define('S3BUCKET', 'ct21');



$id = $_GET['id'];
if (empty($id)) {
	header("Location: search-course");
	die;
}

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
		where a.id = {$id};";

$row = $dosql->GetOne($sql);

$client = new S3Client([
		'version' => 'latest',
		'region' => 'sgp1',
		'endpoint' => 'https://sgp1.digitaloceanspaces.com',
		'credentials' => [
		'key' => S3KEY,
		'secret' => S3SECRECT,
		],
		]);

if (!empty($row['passport'])) {
	$cmd = $client->getCommand('GetObject', [
			'Bucket' => S3BUCKET,
			'Key' => $row['passport'],
			]);
	$request = $client->createPresignedRequest($cmd, '+15 minutes');
	$row['passport'] = (string) $request->getUri();
}

if (!empty($row['graduated'])) {
	$cmd = $client->getCommand('GetObject', [
			'Bucket' => S3BUCKET,
			'Key' => $row['graduated'],
			]);
	$request = $client->createPresignedRequest($cmd, '+15 minutes');
	$row['graduated'] = (string) $request->getUri();
}

if (!empty($row['diploma'])) {
	$cmd = $client->getCommand('GetObject', [
			'Bucket' => S3BUCKET,
			'Key' => $row['diploma'],
			]);
	$request = $client->createPresignedRequest($cmd, '+15 minutes');
	$row['diploma'] = (string) $request->getUri();
}

if (!empty($row['scoresheet'])) {
	$cmd = $client->getCommand('GetObject', [
			'Bucket' => S3BUCKET,
			'Key' => $row['scoresheet'],
			]);
	$request = $client->createPresignedRequest($cmd, '+15 minutes');
	$row['scoresheet'] = (string) $request->getUri();
}

if (!empty($row['ielts_photo'])) {
	$cmd = $client->getCommand('GetObject', [
			'Bucket' => S3BUCKET,
			'Key' => $row['ielts_photo'],
			]);
	$request = $client->createPresignedRequest($cmd, '+15 minutes');
	$row['ielts_photo'] = (string) $request->getUri();
}

if (empty($row)) {
	header("Location: search-course");
	die;
}


//var_dump($row);die;

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>课程申请详情</title>
  <?php
getcss("ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css");
getcss("ajax/libs/bootstrap-table/1.18.2/bootstrap-table.min.css");
getcss("css/magnific-popup.css", true);
getcss("js/layer/theme/default/layer.css", true);
?>
  <style>
    .container {
      width: 90%;
    }

    a.file {
      padding-left: 4px;
    }

    a.file.empty {
      color: red;
    }

    .table {
    	width: auto;
	}
	.table img{max-width:90%}
    td {
      border:1px solid #000 !important;
    	padding: 12px 20px !important;
    }

    .cell-detail-title {
      width: 150px;
      text-align: center;
    }

    .cell-detail-data {
      font-weight: 400;
    }
@media print {
  .not-print-content {
      display: none;
  }
}
@page { margin: 0; }
  </style>
</head>

<body>
  <div class="container">
    <header>
      
    </header>
    <table class="table" id="appTab" style="max-width: 60%;">
    	<tr>
    		<td colspan="2" style="border: none !important;"><h1 style="display: inline;">课程申请详情</h1>
    		<button style="font-size: 14px;float: right;margin-top: 6px;width: 60px;padding: 4px 0;" class="not-print-content" onclick="printbtn()">打印</button></td>
    	</tr>
    	<tr>
    		<td width="200px">申请时间：</td>
    		<td><?php echo $row['apply_time']?></td>
    	</tr>
    	<tr>
    		<td>申请人姓名：</td>
    		<td><?php echo $row['name']?></td>
    	</tr>
    	<tr>
    		<td>出生年月：</td>
    		<td><?php echo $row['birth']?></td>
    	</tr>
    	<tr>
    		<td>联系电话：</td>
    		<td><?php echo $row['phone']?></td>
    	</tr>
    	<tr>
    		<td>电子邮件：</td>
    		<td><?php echo $row['email']?></td>
    	</tr>
    	<tr>
    		<td>申请院校：</td>
    		<td><?php echo $row['institution']?></td>
    	</tr>
    	<tr>
    		<td>申请课程：</td>
    		<td><?php echo $row['course']?></td>
    	</tr>
    	<tr>
    		<td>最高学历或在读年级：</td>
    		<td><?php echo $row['level'] . ' ' . $row['grade'] ?></td>
    	</tr>
    	<tr>
    		<td>毕业或在读院校：</td>
    		<td><?php echo $row['entry_inst']?></td>
    	</tr>
    	<tr>
    		<td>雅思分数：</td>
    		<td><?php echo $row['ielts']?></td>
    	</tr>
    	<tr>
    		<td>备注：</td>
    		<td><?php echo nl2br($row['comment'])?></td>
    	</tr>
    	<tr>
    		<td>护照：</td>
    		<td><?php if ($row['passport'] != ''){ ?><a class="not-print-content" target="_blank" href="<?php echo ($row['passport']) ?>" >点击查看</a><?php }?></td>
    	</tr>
    	<tr>
    		<td>学历毕业证书：</td>
    		<td><?php if ($row['graduated'] != ''){ ?><a class="not-print-content" target="_blank" href="<?php echo ($row['graduated']) ?>" >点击查看</a><?php }?></td>
    	</tr>
    	<tr>
    		<td>学位证：</td>
    		<td><?php if ($row['diploma'] != ''){ ?><a class="not-print-content" target="_blank" href="<?php echo ($row['diploma']) ?>" >点击查看</a><?php }?></td>
    	</tr>
    	<tr>
    		<td>毕业成绩单：</td>
    		<td><?php if ($row['scoresheet'] != ''){ ?><a class="not-print-content" target="_blank" href="<?php echo ($row['scoresheet']) ?>" >点击查看</a><?php }?></td>
    	</tr>
    	<tr>
    		<td>雅思成绩单：</td>
    		<td><?php if ($row['ielts_photo'] != ''){ ?><a class="not-print-content" target="_blank" href="<?php echo ($row['ielts_photo']) ?>" >点击查看</a><?php }?></td>
    	</tr>
    </table>
  </div>

  <?php
getjs("ajax/libs/jquery/3.5.1/jquery.min.js");
getjs("ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js");
getjs("ajax/libs/bootstrap-table/1.18.2/bootstrap-table.min.js");
getjs("ajax/libs/bootstrap-table/1.18.2/locale/bootstrap-table-zh-CN.min.js");
getjs("js/jquery.magnific-popup.min.js", true);
getjs("js/layer/layer.js", true);
?>
  <script>
   	function printbtn() {
     	  if (!!window.ActiveXObject || "ActiveXObject" in window) {
     	    //是否ie
     	    remove_ie_header_and_footer();
     	  }
     	  window.print();
     	}
     	//去掉页眉页脚
     	function remove_ie_header_and_footer() {
     	  var hkey_path =
     	    "HKEY_CURRENT_USER\\Software\\Microsoft\\Internet Explorer\\PageSetup\\";
     	  try {
     	    var RegWsh = new ActiveXObject("WScript.Shell");
     	    RegWsh.RegWrite(hkey_path + "header", "");
     	    RegWsh.RegWrite(hkey_path + "footer", "");
     	  } catch (e) {}
     	}
  </script>
</body>

</html>