<style>
.hide{display:none !important;}
</style>
<div class="kingster-mobile-header-wrap">
    <div class="kingster-mobile-header kingster-header-background kingster-style-slide kingster-sticky-mobile-navigation " id="kingster-mobile-header">
        <div class="kingster-mobile-header-container kingster-container clearfix">
            <!-- ================================================================================ -->
            <!-- ==============================        Logo        ============================== -->
            <div class="animated fadeInUp kingster-logo  kingster-item-pdlr">
                <div class="kingster-logo-inner">
                    <a class="" href="./../cn/"><img src="custom-logo/logo_ct21.png" alt="" loading="lazy" /></a>
                </div>
            </div>
            <!-- ==============================        Logo        ============================== -->
            <!-- ================================================================================ -->
            <div class="kingster-mobile-menu-right">
                
                <!-- ====================  Search  ==================== -->
                <?php //include_once('navbar-search-mobile.php'); ?>

                <!-- Check current page [for nav-item] --> <!-- [make blue line below] -->
                <?php 
                    
                    $class_Home = '';
                    $class_studySolu = '';
                    $class_Course = '';
                    $class_School = '';
                    $class_Immi = '';
                    $class_Fees = '';
                    if ( strpos($_SERVER['PHP_SELF'], '/cn/index') !== false ){
                        $class_Home = 'current-menu-item';
                    }
                    if ( strpos($_SERVER['PHP_SELF'], '/cn/search-studySolution') !== false ){
                        $class_studySolu = 'current-menu-item';
                    }
                    if ( strpos($_SERVER['PHP_SELF'], '/cn/search-course') !== false 
                        || strpos($_SERVER['PHP_SELF'], '/cn/course') !== false ){
                        $class_Course = 'current-menu-item';
                    }
                    if ( strpos($_SERVER['PHP_SELF'], '/cn/search-school') !== false 
                        || strpos($_SERVER['PHP_SELF'], '/cn/school-info') !== false ){
                        $class_School = 'current-menu-item';
                    }
                    if ( strpos($_SERVER['PHP_SELF'], '/cn/search-immigration') !== false ){
                        $class_Immi = 'current-menu-item';
                    }
                    if ( strpos($_SERVER['PHP_SELF'], '/cn/search-fees') !== false ){
                        $class_Fees = 'current-menu-item';
                    }

                    $class_ausInfo = '';
                    $allow = array('/cn/info-', '/cn/info-immigration-list', '/cn/info-immigration-article', '/cn/info-budget-courses', '/cn/info-popular-courses');
                    
                    foreach($allow as $arrValue) {
                        if ( strpos($_SERVER['PHP_SELF'], $arrValue) !== false ){
                            $class_ausInfo = 'current-menu-item';
                        }
                    }

                    $verEng = str_replace('cn', 'en', $_SERVER['REQUEST_URI']);
                    // basename(__FILE__) = current file {navbar.php}
                    // $_SERVER['PHP_SELF'] = after .com {/cn/index.php}, without any after '?'
                    // $_SERVER['REQUEST_URI'] = after .com {/cn/index.php}
                ?>
                <div class="kingster-mobile-menu"><a class="kingster-mm-menu-button kingster-mobile-menu-button kingster-mobile-button-hamburger" href="#kingster-mobile-menu"><span></span></a>
                    <div class="kingster-mm-menu-wrap kingster-navigation-font" id="kingster-mobile-menu" data-slide="right">
                        <ul id="menu-main-navigation" class="m-menu">
                            <!-- 1st Menu [button] -->
                            <li class="menu-item menu-item-home menu-item-has-children <?php echo $class_Home; ?>"><a href="./../cn/">首 页</a>
                                <!-- <ul class="sub-menu">
                                    <li class="menu-item" data-size="60"><a href="./../cn/index2.php">首页 2</a></li>
                                </ul> -->
                            </li>
                            <!-- 2nd Menu [button] -->
                            <li class="menu-item menu-item-has-children <?php echo $class_studySolu; ?>"><a href="./../cn/search-studySolution.php">留学方案</a></li>
                            <!-- 3rd Menu [button] -->
                            <li class="menu-item menu-item-has-children <?php echo $class_Course; ?>"><a href="./../cn/search-course.php">课程搜索</a></li>
                            <!-- 4th Menu [button] -->
                            <li class="menu-item menu-item-has-children <?php echo $class_School; ?>"><a href="./../cn/search-school.php">院校搜索</a></li>
                            <!-- 5th Menu [button] -->
                            <li class="menu-item menu-item-has-children <?php echo $class_Immi; ?>"><a href="./../cn/search-immigration.php">移民搜索</a></li>
                            <!-- 6th Menu [button] -->
                            <li class="hide menu-item menu-item-has-children <?php echo $class_Fees; ?>"><a href="./../cn/search-fees.php">学费搜索</a></li>
                            <!-- 7th Menu [button] -->
                            <li class="menu-item menu-item-has-children <?php echo $class_ausInfo; ?>"><a href="#">澳洲有关资讯</a>
                                <ul class="sub-menu">
                                    <li class="menu-item"><a href="./../cn/info-university-ranking.php">大学排名 / 专业表现</a></li>
                                    <li class="menu-item"><a href="./../cn/info-immigration-list.php">技术移民信息</a></li>
                                    <li class="menu-item"><a href="./../cn/info-budget-courses.php">特价课程</a></li>
                                    <li class="menu-item"><a href="./../cn/info-popular-courses.php">热门课程</a></li>
                                </ul>
                            </li>
                            <!-- 8th Menu [button] -->
                            <li class="menu-item menu-item-has-children <?php echo $class_ausInfo; ?>"><a href="<?php echo $verEng; ?>">
                                <i class="fa fa-globe" aria-hidden="true" style="color: white;"></i>  English</a>
                            </li>
                            <!-- <li class="menu-item menu-item-has-children <?php echo $class_ausInfo; ?>"><a href="<?php echo $verEng; ?>"><img src="custom-icon/flag_cn.png" width="38px" height="38px" loading="lazy" /></a> -->
                            <!-- 9th Menu [button] -->
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>