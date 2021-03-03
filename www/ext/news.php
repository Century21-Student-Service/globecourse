<?php

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

        if (!empty($row['linkurl'])) {
            $gourl = $row['linkurl'];
        } else {
            $gourl = 'newsshow.php?cid=' . $page . '&id=' . $row['id'];
        }

        if ($time == 'T') {
            $time = '<span class="R1">' . MyDate('y-m-d', $row['posttime']) . '</span>';
        }

        echo ('<li>' . $time . '<a href="' . $gourl . '" >' . ReStrLen($row['title'], $num) . '</a></li>');
    }
}
function adlist2($id, $top, $where, $tab = 'img')
{
    if ($top == '') {
        $top = 5;
    }

    if ($where == '') {
        $where = 'WHERE (classid=4 or parentid=4)';
    } else {
        $where = 'WHERE ' . $where;
    }
    if ($id == '') {
        $id = 'kinMaxShow';
    }
    $Db = new MySql(false);
    $Db->Execute("SELECT * FROM `#@__info" . $tab . "` " . $where . " AND delstate='' AND checkinfo=true ORDER BY  orderid DESC LIMIT 0," . $top);
    echo (' <div id="' . $id . '">');
    while ($row = $Db->GetArray()) {
        //获取链接地址
        if ($row['linkurl'] == '') {
            $gourl = 'newsshow.php?cid=' . $row['classid'] . '&id=' . $row['id'];
        } else {
            $gourl = $row['linkurl'];
        }

        echo ('<div><a href="' . $gourl . '" target="_blank"><img src="' . $row['picurl'] . '"  /></a></div>');
    }
    echo (' </div>');

}
/**图片调用**/
function imglist($top, $where, $num, $page)
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
    $Db->Execute("SELECT * FROM `#@__infoimg` " . $where . " AND delstate='' AND checkinfo=true ORDER BY id DESC, orderid DESC LIMIT 0," . $top);
    while ($row = $Db->GetArray()) {
        //获取链接地址
        $gourl = $page . '.php?cid=' . $row['classid'] . '&id=' . $row['id'];
        $pic = $row['picurl'];
        echo (' <li> <a href="' . $gourl . '" title=""><img src="' . $pic . '" width="180" height="104" /></a><div class="d1">' . ReStrLen($row['title'], $num) . '</div></li>');
    }
}

/*********获取课程名称**********/
function getCnameByBh($Bh)
{
    $Db = new MySql(false);
    $row = $Db->GetOne("SELECT * FROM `#@__field` WHERE bh='" . $Bh . "' ");
    return $row['cname'];
}
/*********获取课程名称 (英文)**********/
function getEnameByBh($Bh)
{
    $Db = new MySql(false);
    $row = $Db->GetOne("SELECT * FROM `#@__field` WHERE bh='" . $Bh . "' ");
    $majorEn = empty($row['ename']) ? 'Unclassified' : $row['ename'];

    return $majorEn;
}

/*********获取课程类型**********/
function getCType($type)
{
    $TyArr = array('小学（学前班-6年级）', '初中（7-10年级）', '高中（11-12年级）', '二级证书', '三级证书', '四级证书', '文凭', '高级文凭', '大学预科', '学士学位', '研究生证书', '研究生文凭', '硕士学位（课程修读类）', '硕士学位（研究类）', '博士学位');
    return $TyArr[($type - 1)];
}
/*********获取所在州**********/
function getState($state)
{
    $SArr = array('新南威尔士州', '维多利亚州', '昆士兰州', '南澳', '北领地', '西澳', '堪培拉', '塔斯马尼亚', '新西兰');
    return $SArr[($state - 1)];
}
/*********获取所在国**********/
function getCountry($state)
{
    $SArr = array('澳大利亚', '美国', '新西兰');
    return $SArr[($state - 1)];
}

function getCountryAndState($state)
{
    $Db = new MySql(false);
    // $r = $Db->GetOne("SELECT `fieldsel` FROM `ctm_field` WHERE `fieldname`='" . $sql . "'");
    $r = $Db->GetOne("SELECT s.name AS `state`, c.name AS `country` FROM state s LEFT JOIN country c ON s.country_id = c.id WHERE s.id=$state;");
    return $r;
}

/*********获取 Value (英文)**********/
function getVal_en($sql, $v)
{
    $Db = new MySql(false);
    $r = $Db->GetOne("SELECT `fieldsel` FROM `ctm_field` WHERE `fieldname`='" . $sql . "'");

    $fieldsel = explode(',', $r['fieldsel']);
    foreach ($fieldsel as $value) {
        $va = explode('=', $value);

        if ($v == $va[1]) {
            $stateVal = $va[0];
        }
    }

    return $stateVal;
}

function adlist($top, $where)
{
    if ($top == '') {
        $top = 5;
    }

    if ($where == '') {
        $where = 'WHERE (classid=4 or parentid=4)';
    } else {
        $where = 'WHERE ' . $where;
    }
    $Db = new MySql(false);
    $Db->Execute("SELECT * FROM `#@__infoimg` " . $where . " AND delstate='' AND checkinfo=true ORDER BY  orderid DESC LIMIT 0," . $top);
    echo ('<div class="focus" id="focus"><div id="focus_m" class="focus_m"><ul>');

    $i = 1;
    $css = '';
    while ($row = $Db->GetArray()) {
        //获取链接地址
        if ($row['linkurl'] == '') {
            $gourl = 'newsshow.php?cid=' . $row['classid'] . '&id=' . $row['id'];
        } else {
            $gourl = $row['linkurl'];
        }

        echo ('<li class="li_' . $i . '"><a href="' . $gourl . '" ></a></li>');
        $css = $css . ".focus_m li.li_" . $i . " {background:url(" . $row['picurl'] . ") center 0 no-repeat #288cc0;}";
        $i++;
    }
    echo ('</ul>	</div>');
    echo ('<a href="javascript:;" class="focus_l" id="focus_l" hidefocus="true" title="上一张"><b></b><span></span></a>	<a href="javascript:;" class="focus_r" id="focus_r" hidefocus="true" title="下一张"><b></b><span></span></a></div>');
    echo ('<style>' . $css . '</style>');

}

function getSecNav($cid)
{
    $Db = new MySql(false);
    $Db->Execute("SELECT * FROM `#@__infoclass` Where parentid=" . $cid . "  ORDER BY orderid ASC ");
    while ($row = $Db->GetArray()) {
        echo ('<li><a href="?cid=' . $row['id'] . '" >[' . $row['classname'] . ']</a></li>');
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
