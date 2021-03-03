<?php
require_once('../include/config.inc.php'); 

@$act=$_GET['act'];

switch ($act){
	case 'importCSS_Icon':
		importCSS_Icon();
		break;
}

/*******提取-CSS*******/
function importCSS_Icon(){
	echo("<link id='cssIcon' rel='stylesheet' href='kingster-plugins/goodlayers-core/plugins/combine/style.css' type='text/css' media='all' />");
}
?>