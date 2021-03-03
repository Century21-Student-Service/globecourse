<?php session_start();
$action=$_GET['action'];
$tel=$_GET['tel'];
if(!empty($action) and !empty($tel)){
	if($action=='send'){
		$code = rand(100000,999999);
		$data ="您好！潮流留学搜索网站的查看验证码是：" . $code ;
		$_SESSION['code'] = $code;
		$post_data = array();
		$post_data['account'] = iconv('GB2312', 'GB2312',"vip_czy");
		$post_data['pswd'] = iconv('GB2312', 'GB2312',"Tch123456");
		$post_data['mobile'] =$tel;
		$post_data['msg']=mb_convert_encoding("$data",'UTF-8', 'auto');
		$url='http://222.73.117.158/msg/HttpBatchSendSM?'; 
		$o="";
		foreach ($post_data as $k=>$v)
		{
		   $o.= "$k=".urlencode($v)."&";
		}
		$post_data=substr($o,0,-1);
		 
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		$result = curl_exec($ch);
	}	
	if($action=='chk'){
	  $code=$_GET['yzm'];
	  if ( !empty( $tel ) and !empty( $code ) )
		{
			if ($code!=$_SESSION['code'])
			{  
				 echo 0;
			}else{
				 $_SESSION['username']=$tel;
				 echo 1;
			}
		}
	}
	
}else{
   echo '参数错误';
}
?>