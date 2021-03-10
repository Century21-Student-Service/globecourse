<?php
require_once(dirname(__FILE__).'./../include/config.inc.php');
    
    $id = isset($state) ? intval($state) : 0;
    if($id){

        $dosql->Execute("SELECT * FROM `#@__infolist` WHERE `immigration`=1 AND `state`=$id");

        $arr = array();
        $resarr = array();
        $i=0;

        while($row = $dosql->GetArray()){
            if (!in_array($row['type'],$resarr)) {

                $r = $dosql->GetOne("SELECT `fieldsel` FROM `ctm_field` WHERE `fieldname`='typeEn'");
                $fieldsel = explode(',',$r['fieldsel']);

                foreach($fieldsel as $value){
                    $va = explode('=',$value);

                    if (strstr($row['type'],$va[1]))
                        $arr[$i]=$va;
                }

                $resarr[$i]=$row['type'];
            }
            
            $i++;
        }
        // var_dump($arr);
    }

    echo json_encode($arr);
?>