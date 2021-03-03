<?php
	@$state=$_POST['state'];
	@$courseType=$_POST['schoolType'];
	@$schoolName=$_REQUEST['schoolName'];

	if(!empty($state)){
		$_SESSION['states']=$state;
		$statestr=$_SESSION['states'];
	}else{
		if ($state == '0'){
	      $_SESSION['states'] = 0;
	      $statestr=0;
	    }
	    else if(empty($_SESSION['states'])){
			$statestr=0;
		}else{
			$statestr=$_SESSION['states'];
		}
	}

	if(!empty($courseType)){
		$_SESSION['schoolType']=$courseType;
	    $cstr=$_SESSION['schoolType'];
	}else{
		if ($courseType == '0'){
	      $_SESSION['schoolType'] = 0;
	      $cstr=0;
	    }
	    else if(empty($_SESSION['schoolType'])){
			$cstr=0;
		}else{
			$cstr=$_SESSION['schoolType'];
		}
	}

	if( !empty($schoolName) ){
		$_SESSION['schoolName'] = $schoolName;
		$sName = $_SESSION['schoolName'];
	}
	else {
		if ($schoolName == '0'){ //  dropdown set to 0
	    	$_SESSION['schoolName'] = 0;
	    	$sName = 0;
	    }
	    else if( empty($_SESSION['schoolName']) ){
	    	$sName = '';
	    }else{
	    	$sName = $_SESSION['schoolName'];
	    }
	}

	/** ==================================================================================== **/
	/** ______________________________        get List        ______________________________ **/
	/** ==================================================================================== **/
	if($statestr==0){
		$stateW="";
	}else{
		$stateW=" state='".$statestr."' AND ";
	}
	if($cstr==0){
	    $TypeW="";
	}else{
	    $TypeW="  FIND_IN_SET($cstr,schoolType2) AND ";
	}

	if($sName == ''){
		$sNameW = "";
	}
	else {
		$sNameW = " title LIKE '%".$sName."%' AND ";
	}

	$dopage->GetPage("SELECT * FROM `#@__infoimg` WHERE classid=3 AND ".$stateW." ".$TypeW." ".$sNameW." checkinfo='true' AND delstate='' AND checkinfo=true ORDER BY orderid DESC",10);
?>