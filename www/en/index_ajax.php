


case 'getContent_Tab_home':
    $index=$_GET['index'];
    getContent_Tab_home($index);
    break;



/*******提取-主页Tab*******/
function getContent_Tab_home($index){
    $con_1 = '<div class="animated fadeIn ctm-bgSearch" style="background-image: url(custom-images/home3_school_q1.jpg); background-size: cover; background-position: center;" id="box_tab1_content">
                    <!-- =====  Overlay  ===== -->
                    <div class="ctm-bgSearch_overlay"></div>
                    <!-- =====  (Insert) Text Field  ===== -->
                    <div style="text-align: center; width: 100%; position: absolute;">
                        <h4 style="color: white; margin-bottom: 0; line-height: 36px;">院校快搜<br><span id="span_1dd7_0" style="color: #bababa;">输入「院校名称」快速搜索</span></h4>
                        <input class="ctm-txtField" style="width: 60%; min-width: 320px;" name="courseName" type="text" id="courseName" />
                        <div class="gdlr-core-button-item gdlr-core-item-pdlr gdlr-core-item-pdb" style="padding-top: 20px;">
                            <a class="gdlr-core-button  gdlr-core-button-solid gdlr-core-button-no-border" style="width: 140px; border-radius: 6px;" href="school-info.php?id=23" id="a_1dd7_0"><span class="gdlr-core-content" >搜 索</span></a>
                        </div>
                    </div>
                </div>';

    $con_2 = '<div class="animated fadeIn ctm-bgSearch" style="background-image: url(custom-images/home2_course_q1.jpg); background-size: cover; background-position: center;" id="box_tab2_content">
                    <!-- =====  Overlay  ===== -->
                    <div class="ctm-bgSearch_overlay" style="background-color: #0062a9 !important;"></div> <!-- #0054a9 -->
                    <!-- =====  (Insert) Text Field  ===== -->
                    <div style="text-align: center; width: 100%; position: absolute;">
                        <h4 style="color: white; margin-bottom: 0; line-height: 36px;">课程快搜<br><span id="span_1dd7_0" style="color: #bababa;">输入「课程名称」快速搜索</span></h4>
                        <input class="ctm-txtField" style="width: 60%; min-width: 320px;" name="courseName" type="text" id="courseName" />
                        <div class="gdlr-core-button-item gdlr-core-item-pdlr gdlr-core-item-pdb" style="padding-top: 20px;">
                            <a class="gdlr-core-button  gdlr-core-button-solid gdlr-core-button-no-border" style="width: 140px; border-radius: 6px;" href="school-info.php?id=23" id="a_1dd7_0"><span class="gdlr-core-content" >搜 索</span></a>
                        </div>
                    </div>
                </div>';

    $con_3 = '<div class="row" id="box_tab3_content">
                    <div class="animated fadeIn ctm-bgSearch gdlr-core-pbf-column gdlr-core-column-30" style="background-image: url(custom-images/home4_immigration_q1.jpg); background-size: cover; background-repeat: no-repeat; background-position: center;">
                        <!-- =====  Overlay  ===== -->
                        <div class="ctm-bgSearch_overlay"></div>
                        <!-- =====  (Insert) Text Field  ===== -->
                        <div style="text-align: left; width: 100%; position: absolute; padding-left: 80px; padding-right: 80px;">
                            <h4 style="color: white; margin-bottom: 0; line-height: 36px;">特价课程<br><span id="span_1dd7_0">享受超优惠课程</span></h4>
                            <div class="gdlr-core-text-box-item-content" id="div_1dd7_20" style="margin-top: 20px;">
                                <p>隶属新南威尔士州教育部，由政府拥有及管理。 通过学习TAFE课程，学生可以接触世界各地的文化,互相交流。TAFE  NSW也非常关注不同文化背景的海外留学生的个别需要，在他们的学习过程中给予个别辅导。</p>
                            </div>
                            <div><a class="gdlr-core-button  gdlr-core-button-solid gdlr-core-button-no-border" href="info-budget-courses.php" id="a_1dd7_0"><span class="gdlr-core-content" >了解更多</span></a></div>
                        </div>
                    </div>
                    
                    <div class="animated fadeIn ctm-bgSearch gdlr-core-pbf-column gdlr-core-column-30" style="background-image: url(custom-images/home1_sSolution_q1.jpg); background-size: cover; background-repeat: no-repeat; background-position: center;">
                        <!-- =====  Overlay  ===== -->
                        <div class="ctm-bgSearch_overlay" style="background-color: #0062a9 !important;"></div>
                        <!-- =====  (Insert) Text Field  ===== -->
                        <div style="text-align: left; width: 100%; position: absolute; padding-left: 80px; padding-right: 80px;">
                            <h4 style="color: white; margin-bottom: 0; line-height: 36px;">热门课程<br><span id="span_1dd7_0" style="color: #192f59;">透过热门课程了解趋势</span></h4>
                            <div class="gdlr-core-text-box-item-content" id="div_1dd7_20" style="margin-top: 20px;">
                                <p>隶属新南威尔士州教育部，由政府拥有及管理。 通过学习TAFE课程，学生可以接触世界各地的文化,互相交流。TAFE  NSW也非常关注不同文化背景的海外留学生的个别需要，在他们的学习过程中给予个别辅导。</p>
                            </div>
                            <div><a class="gdlr-core-button  gdlr-core-button-solid gdlr-core-button-no-border" href="info-popular-courses.php" id="a_1dd7_0"><span class="gdlr-core-content" >了解更多</span></a></div>
                        </div>
                    </div>
                </div>';

    $con_4 = '<div class="row" id="box_tab4_content">
                    <div class="animated fadeIn ctm-bgSearch gdlr-core-pbf-column gdlr-core-column-30" style="background-image: url(custom-logo/logo_Tafe_WSI.jpg); background-size: contain; background-repeat: no-repeat; background-position: center;"></div>
                    
                    <div class="animated fadeIn ctm-bgSearch gdlr-core-pbf-column gdlr-core-column-30" style="background-image: url(custom-images/school-TAFE_pic1.jpg); background-size: cover; background-repeat: no-repeat; background-position: center;">
                        <!-- =====  Overlay  ===== -->
                        <div class="ctm-bgSearch_overlay"></div>
                        <!-- =====  (Insert) Text Field  ===== -->
                        <div style="text-align: left; width: 100%; position: absolute; padding-left: 80px; padding-right: 80px;">
                            <h4 style="color: white; margin-bottom: 0; line-height: 36px;">TAFE 学院<br><span id="span_1dd7_0">每年多项课程都在2月开课</span></h4>
                            <div class="gdlr-core-text-box-item-content" id="div_1dd7_20" style="margin-top: 20px;">
                                <p>隶属新南威尔士州教育部，由政府拥有及管理。 通过学习TAFE课程，学生可以接触世界各地的文化,互相交流。TAFE  NSW也非常关注不同文化背景的海外留学生的个别需要，在他们的学习过程中给予个别辅导。</p>
                            </div>
                            <div><a class="gdlr-core-button  gdlr-core-button-solid gdlr-core-button-no-border" href="school-info.php?id=23" id="a_1dd7_0"><span class="gdlr-core-content" >了解更多</span></a></div>
                        </div>
                    </div>
                </div>';

    $tab_content = array($con_1, $con_2, $con_3, $con_4);
    
    foreach ($tab_content as $pos => $c){
        if ($pos == $index) {
            echo($c);
        }
    }
}


var btnTab_all = [jQuery('#box_tab1'), jQuery('#box_tab2'), jQuery('#box_tab3'), jQuery('#box_tab4')];
var tab_content = [jQuery('#box_tab1_content'), jQuery('#box_tab2_content'), jQuery('#box_tab3_content'), jQuery('#box_tab4_content')];

allContent_hide(tab_content);
tab_content[0].show();
tabSwitch(btnTab_all);

function tabSwitch(btnTab_id) {
    jQuery.each(btnTab_id, function(index, value){
        this.click(function(mouseI, mouseV){
            
            //  hide current page
            jQuery.each(tab_content, function(cI, cV){
                this.hide();
            });
            
            //  show target page
            jQuery.ajax({
                type :'GET',
                url  :'./../ext/ajaxFun.php?act=getContent_Tab_home&index='+index,
                date :'',
                success:function(m){
                    jQuery('#tab_container').children().remove();
                    jQuery('#tab_container').append(m);
                }
            });
            tab_content[index].show();
            // tab_content[index].addClass('animated fadeInLeft');
        });
    });
}

function allContent_hide(btnTab_all){
    jQuery.each(btnTab_all, function(index, value){
        this.hide();
    });
}