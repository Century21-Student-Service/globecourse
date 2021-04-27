<?php session_start();
require_once '../include/config.inc.php';
unset($_SESSION['states']);
unset($_SESSION['cType']);
unset($_SESSION['cN']);
unset($_SESSION['bField']);
@$act = $_GET['act'];

switch ($act) {
    case 'getSecField':
        $type = $_GET['type'];
        $pid = $_GET['pid'];
        getSecField($type, $pid);
        break;
    case 'getSecField_en':
        $type = $_GET['type'];
        $pid = $_GET['pid'];
        getSecField_en($type, $pid);
        break;
    case 'getSchoolPic':
        $id = $_GET['id'];
        getSchoolPic($id);
        break;
    case 'getStudySolution_cType':
        $sType = $_GET['sType'];
        getStudySolution_cType($sType);
        break;
    case 'getStudySolution_school':
        $cType = $_GET['cType'];
        $state = $_GET['state'];
        getStudySolution_school($cType, $state);
        break;
    case 'getStudySolution_schoolAll':
        $cTypeAll = $_GET['cTypeAll'];
        $width = $_GET['width'];
        getStudySolution_schoolAll($cTypeAll, $width);
        break;
    case 'getStudySolution_cType_en':
        $sType = $_GET['sType'];
        getStudySolution_cType_en($sType);
        break;
    case 'getStudySolution_schoolAll_en':
        $cTypeAll = $_GET['cTypeAll'];
        $width = $_GET['width'];
        getStudySolution_schoolAll_en($cTypeAll, $width);
        break;
}

/***单页新闻调用***/
/****用法  newslist("","(classid=1 or parentid=1)","T",22,""); **********/
function newslist($top, $where, $time, $num, $page)
{
    if ($top == '') {
        $top = 5;
    }

    if ($page == '') {
        $page = "newsshow";
    }

    if ($num == '') {
        $num = 20;
    }

    if ($where == '') {
        $where = 'WHERE (classid=4 or parentid=4)';
    } else {
        $where = 'WHERE ' . $where;
    }
    $Db = new MySql(false);
    $Db->Execute("SELECT * FROM `#@__infolist` " . $where . " AND delstate='' AND checkinfo=true ORDER BY id DESC, orderid DESC LIMIT 0," . $top);
    while ($row = $Db->GetArray()) {
        //获取链接地址
        $gourl = $page . '.php?cid=' . $row['classid'] . '&id=' . $row['id'];
        if ($time == 'T') {
            $time = '<span class="R1">' . MyDate('y-m-d', $row['posttime']) . '</span>';
        }

        echo ('<li>' . $time . '<a href="' . $gourl . '" >' . ReStrLen($row['title'], $num) . '</a></li>');
    }
}

/*******调用课程范围的二级分类*******/
function getSecField($type = 1, $pid = '01')
{
    $Db = new MySql(false);
    $Db->Execute("SELECT * FROM `#@__field` WHERE `type`=" . $type . " AND pid='" . $pid . "' ");
    echo ('<option value="0">请选择「课程」</option>');
    while ($row = $Db->GetArray()) {
        echo ('<option value="' . $row['bh'] . '">' . $row['bh'] . ' - ' . $row['cname'] . '</option>');
    }
}
/*******调用课程范围的二级分类 - (英文)*******/
function getSecField_en($type = 1, $pid = '01')
{
    $Db = new MySql(false);
    $Db->Execute("SELECT * FROM `#@__field` WHERE `type`=" . $type . " AND pid='" . $pid . "' ");
    echo ('<option value="0">Please choose "Major"</option>');
    while ($row = $Db->GetArray()) {
        empty($row['ename']) ? $facultyName = '** Title - Could not be loaded' : $facultyName = $row['ename'];
        echo ('<option value="' . $row['bh'] . '">' . $row['bh'] . ' - ' . $facultyName . '</option>');
    }
}

function getPar($Id)
{
    $Db = new MySql(false);
    $R = $Db->GetOne("SELECT * FROM `#@__infoclass` WHERE id=" . $Id);
    echo $R['classname'];
}
function getParId($Id)
{
    $Db = new MySql(false);
    $R = $Db->GetOne("SELECT * FROM `#@__infoclass` WHERE id=" . $Id);
    echo $R['parentid'];
}

function getEn($mid)
{
    $Db = new MySql(false);
    $R = $Db->GetOne("SELECT * FROM `#@__info` WHERE classid=" . $mid);
    echo $R['enname'];
}

/*******提取-院校图片*******/
function getSchoolPic($id)
{
    $dosql = new MySql(false);
    $Sch = $dosql->GetOne("SELECT * FROM `#@__infoimg` WHERE id=" . $id);
    $picarr = unserialize($Sch['picarr']);

    foreach ($picarr as $k) {
        $v = explode(',', $k);

        echo ('<div class="gdlr-core-item-list class1 gdlr-core-item-pdlr gdlr-core-column-20" style="padding-left: 10px; padding-right: 10px;">
                <div class="gdlr-core-portfolio-grid  gdlr-core-center-align gdlr-core-style-normal">
                    <div class="gdlr-core-portfolio-thumbnail gdlr-core-media-image  gdlr-core-style-icon">
                        <div class="gdlr-core-portfolio-thumbnail-image-wrap  gdlr-core-zoom-on-hover" style="border-radius: 6px; box-shadow: 0px 2px 8px #0000008a; transition: all .3s ease;">

                            <a class="gdlr-core-lightgallery gdlr-core-js " href="./../' . $v[0] . '" data-lightbox-group="gdlr-core-img-group-1">

                            	<img src="./../' . $v[0] . '" width="100%" height="100%" alt="" style="" />

                            	<span class="gdlr-core-image-overlay  gdlr-core-portfolio-overlay gdlr-core-image-overlay-center-icon gdlr-core-js" style="display: flex; justify-content: center; align-items: center; border-radius: 6px;">
                            		<span style="line-height: 1.55;">  <!-- class="gdlr-core-image-overlay-content" -->
                            			<span class="gdlr-core-portfolio-icon-wrap" ><i class="gdlr-core-portfolio-icon arrow_expand" ></i></span>
                            		</span>
                                </span>
                            </a>

                        </div>
                    </div>
                    <!-- <div class="gdlr-core-portfolio-content-wrap gdlr-core-skin-divider">
                        <h3 class="gdlr-core-portfolio-title gdlr-core-skin-title" style="font-size: 19px ;font-weight: 600 ;letter-spacing: 0px ;text-transform: none ;"><a href="#" >Charity &#038; Voluntary For Social</a></h3></div> -->
                </div>
            </div>');
    }
}

/*******提取-留学方案*******//*******search-studySolution.php*******/
function getStudySolution_cType($t)
{
    $Db = new MySql(false);
    $Db->Execute("SELECT * FROM `study_solution` WHERE FIND_IN_SET($t,typeSolution)");

    while ($va = $Db->GetArray()) {
        /***  (Set) recognition-Name [radio button]  ***/
        $radio_Name = 'solution';
        $radio_ID = 'solution';

        /***  (Set) Button-Percentage [radio button]  ***/
        $radio_Class = 'border-box_100_ext';

        /***  (Insert) State [radio button]  ***/
        echo ('<label class="">
					<input type="radio" id="' . $radio_ID . '" name="' . $radio_Name . '" value="' . $va["type"] . '">
					<div class="' . $radio_Class . '"><div>
						<span>' . $va["name"] . '</span><br>
						<span>' . $va["brief"] . '</span><br>');
        if ($va["feature"] != '') {echo ('<span><strong>特点：</strong>' . $va["feature"] . '</span><br>');}
        echo ('</div></div>
			</label>');
    }
}

function getStudySolution_cType_en($t)
{
    $Db = new MySql(false);
    $Db->Execute("SELECT * FROM `study_solution` WHERE FIND_IN_SET($t,typeSolution)");

    while ($va = $Db->GetArray()) {
        /***  (Set) recognition-Name [radio button]  ***/
        $radio_Name = 'solution';
        $radio_ID = 'solution';

        /***  (Set) Button-Percentage [radio button]  ***/
        $radio_Class = 'border-box_100_ext';

        /***  (Insert) State [radio button]  ***/
        echo ('<label class="">
					<input type="radio" id="' . $radio_ID . '" name="' . $radio_Name . '" value="' . $va["type"] . '">
					<div class="' . $radio_Class . '"><div>
						<span>' . $va["name_en"] . '</span><br>
						<span>' . $va["brief_en"] . '</span><br>');
        if ($va["feature"] != '') {echo ('<span><strong>Features: </strong>' . $va["feature_en"] . '</span><br>');}
        echo ('</div></div>
			</label>');
    }
}

function getStudySolution_cType_old($t)
{
    $Db = new MySql(false);
    $Db->Execute("SELECT * FROM `#@__study_solution` WHERE FIND_IN_SET($t,typeSolution)");

    while ($va = $Db->GetArray()) {
        /***  (Set) recognition-Name [radio button]  ***/
        $radio_Name = 'solution';
        $radio_ID = 'solution';

        /***  (Set) Button-Percentage [radio button]  ***/
        $radio_Class = 'border-box_100_ext';

        /***  (Insert) State [radio button]  ***/
        echo ('<label class="">
					<input type="radio" id="' . $radio_ID . '" name="' . $radio_Name . '" value="' . $va["type"] . '">
					<div class="' . $radio_Class . '"><div>
						<span>' . $va["title"] . '</span><br>
						<span>' . $va["brief"] . '</span><br>');
        if ($va["feature"] != '') {echo ('<span><strong>特点：</strong>' . $va["feature"] . '</span><br>');}
        echo ('</div></div>
			</label>');
    }
}

function getStudySolution_school($cType, $state)
{

    if ($state == -2) {
        $sqlState = '';
        $s = $state;
    } else {
        $sqlState = ' AND state=' . ($state + 1);
        $s = $state + 1;
    }

    /***  (get) School List  ***/
    $Db = new MySql(false);
    $Db->Execute("SELECT * FROM `#@__infoimg` WHERE classid=3 AND delstate='' AND checkinfo=true AND FIND_IN_SET($cType,schoolType2)" . $sqlState);

    /***  (get) State Name [selected]  ***/
    $r = $Db->GetOne("SELECT `fieldsel` FROM `#@__diyfield` WHERE `id`=5");
    $fieldsel = explode(',', $r['fieldsel']);

    /***  State Name  ***/
    foreach ($fieldsel as $value) {
        $v = explode('=', $value);

        if ($v[1] == $s) {
            echo ('<h4 class="title-1 bold ctm-widget-title">' . $v[0] . '</h4>');
        }
    }
    /***  School List  ***/
    $boxCount = 0;
    while ($va = $Db->GetArray()) {

        $boxCount++;

        echo ('<div class="gdlr-core-pbf-column gdlr-core-column-20" style="text-align: center; min-height: 240px; margin-bottom: 10px;" value="' . $boxCount . '">
                	<a href="school-info.php?id=' . $va['id'] . '">
	                	<div>
	                		<img src="./../' . $va['picurl'] . '" class="ctm-nearbyUni__img" />
	                	</div>
	                	<h6 style="margin-top: 10px;">' . $va['title'] . '</h6>
	                </a>
                </div>');
    }
}

function getStudySolution_schoolAll($cType, $width)
{
    require '../../config/conn.php';

    $sql_state = "SELECT id,`name`  FROM `state` ORDER BY id;";
    $stmt_state = $conn->prepare($sql_state);
    $stmt_state->execute();

    $sql_inst = "SELECT id,name,badge
								 FROM institution
								 WHERE `status`>0
								 AND state_id = ?
								 AND id IN(
                                    SELECT c.inst_id
                                    FROM course c
                                    INNER JOIN study_solution s ON FIND_IN_SET(c.level_id,s.level_id)
                                    WHERE s.type = ?) ";
    $stmt_inst = $conn->prepare($sql_inst);

    foreach ($stmt_state->fetchAll(PDO::FETCH_ASSOC) as $state) {
        echo ('<h4 class="title-1 bold ctm-widget-title" id="stateTitle_' . $state['id'] . '">' . $state['name'] . '</h4>');
        $stmt_inst->execute([$state['id'], $cType]);
        $uniCount = 0;
        $boxCount = 0;
        foreach ($stmt_inst->fetchAll(PDO::FETCH_ASSOC) as $inst) {
            $boxCount++;
            echo ('<div class="gdlr-core-pbf-column gdlr-core-column-15" style="text-align: center; min-height: 200px; margin-bottom: 10px;" value="' . $boxCount . '">
	                	<a href="school-info.php?id=' . $inst['id'] . '">
		                	<div>
		                		<img src="./../' . $inst['badge'] . '" class="ctm-nearbyUni__img" style="height: 100px !important;" />
		                	</div>
		                	<h6 style="margin-top: 10px;">' . $inst['name'] . '</h6>
		                </a>
	                </div>');
            $uniCount++;
        }
        if ($width < 750) {
            $uniCount = $uniCount * 220; // mobile
        } else {
            if ($uniCount != 0 && ($uniCount / 4) <= 1) { // only 1 row
                $uniCount = 280; // original = 300
            } else {
                $uniCount = ceil($uniCount / 4) * 260;
            }
        }
        echo ('<div style="margin-top: ' . $uniCount . 'px;"></div>');
    }
}

function getStudySolution_schoolAll_old($cType, $width)
{

    $Db = new MySql(false);
    $r = $Db->GetOne("SELECT `fieldsel` FROM `#@__diyfield` WHERE `id`=5");
    $fieldsel = explode(',', $r['fieldsel']);

    foreach ($fieldsel as $value) {
        $v = explode('=', $value);

        /***  (get) State Name [selected]  ***/
        echo ('<h4 class="title-1 bold ctm-widget-title" id="stateTitle_' . $v[1] . '">' . $v[0] . '</h4>');

        /***  (get) School List  ***/
        $uniCount = 0;
        $Db->Execute("SELECT * FROM `#@__infoimg` WHERE classid=3 AND delstate='' AND checkinfo=true AND FIND_IN_SET($cType,schoolType2) AND state=" . $v[1]);

        $boxCount = 0;
        while ($va = $Db->GetArray()) {
            $boxCount++;

            // echo('<div class="gdlr-core-pbf-column gdlr-core-column-20" style="text-align: center; min-height: 240px; margin-bottom: 10px;" value="'.$boxCount.'">
            echo ('<div class="gdlr-core-pbf-column gdlr-core-column-15" style="text-align: center; min-height: 200px; margin-bottom: 10px;" value="' . $boxCount . '">
	                	<a href="school-info.php?id=' . $va['id'] . '">
		                	<div>
		                		<img src="./../' . $va['picurl'] . '" class="ctm-nearbyUni__img" style="height: 100px !important;" />
		                	</div>
		                	<h6 style="margin-top: 10px;">' . $va['title'] . '</h6>
		                </a>
	                </div>');
            $uniCount++;
        }
        /***  Gap [between state]  ***/
        if ($width < 750) {
            $uniCount = $uniCount * 220; // mobile
        } else {
            if ($uniCount != 0 && ($uniCount / 4) <= 1) { // only 1 row
                $uniCount = 280; // original = 300
            } else {
                $uniCount = ceil($uniCount / 4) * 260;
            }
            // original = 280

            // if ($uniCount != 0 && ($uniCount /3) <= 1){  // only 1 row
            //     $uniCount = 300;
            // }
            // else
            //     $uniCount = ceil($uniCount /3) *280;
        }

        echo ('<div style="margin-top: ' . $uniCount . 'px;"></div>');
    }
}

/*******提取-留学方案 (英文)*******//*******search-studySolution.php*******/
function getStudySolution_cType_en_old($t)
{
    $Db = new MySql(false);
    $Db->Execute("SELECT * FROM `#@__study_solution` WHERE FIND_IN_SET($t,typeSolution)");

    while ($va = $Db->GetArray()) {
        /***  (Set) recognition-Name [radio button]  ***/
        $radio_Name = 'solution';
        $radio_ID = 'solution';

        /***  (Set) Button-Percentage [radio button]  ***/
        $radio_Class = 'border-box_100_ext';

        /***  (Insert) State [radio button]  ***/
        echo ('<label class="">
					<input type="radio" id="' . $radio_ID . '" name="' . $radio_Name . '" value="' . $va["type"] . '">
					<div class="' . $radio_Class . '"><div>
						<span>' . $va["nameEn"] . '</span><br>
						<span>' . $va["briefEn"] . '</span><br>');
        if ($va["featureEn"] != '') {echo ('<span><strong>Features：</strong>' . $va["featureEn"] . '</span><br>');}
        echo ('</div></div>
			</label>');
    }
}
function getStudySolution_schoolAll_en_old($cType, $width)
{

    $Db = new MySql(false);
    $r = $Db->GetOne("SELECT `fieldsel` FROM `ctm_field` WHERE `fieldname`='stateEn'");
    $fieldsel = explode(',', $r['fieldsel']);

    foreach ($fieldsel as $value) {
        $v = explode('=', $value);

        /***  (get) State Name [selected]  ***/
        echo ('<h4 class="title-1 bold ctm-widget-title" id="stateTitle_' . $v[1] . '">' . $v[0] . '</h4>');

        /***  (get) School List  ***/
        $uniCount = 0;
        $Db->Execute("SELECT * FROM `#@__infoimg` WHERE classid=3 AND delstate='' AND checkinfo=true AND FIND_IN_SET($cType,schoolType2) AND state=" . $v[1]);

        $boxCount = 0;
        while ($va = $Db->GetArray()) {
            $boxCount++;

            // echo('<div class="gdlr-core-pbf-column gdlr-core-column-20" style="text-align: center; min-height: 240px; margin-bottom: 10px;" value="'.$boxCount.'">
            echo ('<div class="gdlr-core-pbf-column gdlr-core-column-15" style="text-align: center; min-height: 200px; margin-bottom: 10px;" value="' . $boxCount . '">
	                	<a href="school-info.php?id=' . $va['id'] . '">
		                	<div>
		                		<img src="./../' . $va['picurl'] . '" class="ctm-nearbyUni__img" style="height: 100px !important;" />
		                	</div>
		                	<h6 style="margin-top: 10px;">' . $va['title'] . '</h6>
		                </a>
	                </div>');
            $uniCount++;
        }
        /***  Gap [between state]  ***/
        if ($width < 750) {
            $uniCount = $uniCount * 220; // mobile
        } else {
            if ($uniCount != 0 && ($uniCount / 4) <= 1) { // only 1 row
                $uniCount = 280; // original = 300
            } else {
                $uniCount = ceil($uniCount / 4) * 260;
            }
            // original = 280

            // if ($uniCount != 0 && ($uniCount /3) <= 1){  // only 1 row
            //     $uniCount = 300;
            // }
            // else
            //     $uniCount = ceil($uniCount /3) *280;
        }

        echo ('<div style="margin-top: ' . $uniCount . 'px;"></div>');
    }
}

function getStudySolution_schoolAll_en($cType, $width)
{
    require '../../config/conn.php';

    $sql_state = "SELECT id,`name_en` AS `name`  FROM `state` ORDER BY id;";
    $stmt_state = $conn->prepare($sql_state);
    $stmt_state->execute();

    $sql_inst = "SELECT id,name_en AS `name`,badge
								 FROM institution
								 WHERE `status`>0
								 AND state_id = ?
								 AND id IN(
                                    SELECT c.inst_id
                                    FROM course c
                                    INNER JOIN study_solution s ON FIND_IN_SET(c.level_id,s.level_id)
                                    WHERE s.type = ?) ";
    $stmt_inst = $conn->prepare($sql_inst);

    foreach ($stmt_state->fetchAll(PDO::FETCH_ASSOC) as $state) {
        echo ('<h4 class="title-1 bold ctm-widget-title" id="stateTitle_' . $state['id'] . '">' . $state['name'] . '</h4>');
        $stmt_inst->execute([$state['id'], $cType]);
        $uniCount = 0;
        $boxCount = 0;
        foreach ($stmt_inst->fetchAll(PDO::FETCH_ASSOC) as $inst) {
            $boxCount++;
            echo ('<div class="gdlr-core-pbf-column gdlr-core-column-15" style="text-align: center; min-height: 200px; margin-bottom: 10px;" value="' . $boxCount . '">
	                	<a href="school-info.php?id=' . $inst['id'] . '">
		                	<div>
		                		<img src="./../' . $inst['badge'] . '" class="ctm-nearbyUni__img" style="height: 100px !important;" />
		                	</div>
		                	<h6 style="margin-top: 10px;">' . $inst['name'] . '</h6>
		                </a>
	                </div>');
            $uniCount++;
        }
        if ($width < 750) {
            $uniCount = $uniCount * 220; // mobile
        } else {
            if ($uniCount != 0 && ($uniCount / 4) <= 1) { // only 1 row
                $uniCount = 280; // original = 300
            } else {
                $uniCount = ceil($uniCount / 4) * 260;
            }
        }
        echo ('<div style="margin-top: ' . $uniCount . 'px;"></div>');
    }
}
