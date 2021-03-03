<?php

/*
 * 说明：前端引用文件
**************************
(C)2010-2014 phpMyWind.com
update: 2014-5-31 21:58:30
person: Feng
**************************
*/

require_once(dirname(__FILE__).'/common.inc.php');
require_once(PHPMYWIND_INC.'/func.class.php');
require_once(PHPMYWIND_INC.'/page.class.php');


if(!defined('IN_PHPMYWIND')) exit('Request Error!');


//网站开关
if($cfg_webswitch == 'N')
{
	echo $cfg_switchshow.'<br /><br /><i>'.$cfg_webname.'</i>';
	exit();
}


// 旧的链接转发到新的链接
$pgNew = array('sou', 'schoolShow_zysh', 'schoolShow_xx_id_23_jdgl', 'schoolShow_xx_id_23_yykc', 'schoolShow.php', 'schoolShow_xx', 'schoolShow_img', 'schoolShow_video', 'schoolShow_zy', 'schoolShow2', 'schoolShow2_xx', 'schoolShow2_img');
    
    foreach($pgNew as $arrVal) {
        if ( strpos($_SERVER['PHP_SELF'], $arrVal) !== false ){  //if url contain the val in the array
            
            if ($arrVal == 'sou'){
                $pgNew_update = str_replace($arrVal, 'index', $_SERVER['REQUEST_URI']);
                header('location: '.$pgNew_update);
                exit();
            }
            else if ($arrVal == 'schoolShow_zysh'){
            	$pgNew_update = str_replace($arrVal, 'cn/course-info', $_SERVER['REQUEST_URI']);
            	header('location: '.$pgNew_update);
            	exit();
            }
            else{
            	$pgNew_update = str_replace($arrVal, 'cn/school-info', $_SERVER['REQUEST_URI']);
            	header('location: '.$pgNew_update);
            	exit();
            }
        }
    }
?>