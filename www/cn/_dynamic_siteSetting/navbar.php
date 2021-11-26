<style>
.hide{display:none !important;}
</style>

<!-- ===============        (dark) Top Bar        =============== -->
<div class="kingster-top-bar">
    <div class="kingster-top-bar-background"></div>
    <div class="kingster-top-bar-container kingster-container ">
        <div class="kingster-top-bar-container-inner clearfix">
            <!-- <div class="kingster-top-bar-left kingster-item-pdlr"><i class="fa fa-envelope-open-o" id="i_fd84_0"></i> contact@KUTheme.edu <i class="fa fa-phone" id="i_fd84_1"></i> +1-3435-2356-222</div> -->
            <div class="kingster-top-bar-right kingster-item-pdlr">
                <ul id="kingster-top-bar-menu" class="sf-menu kingster-top-bar-menu kingster-top-bar-right-menu">
                    <li class="menu-item kingster-normal-menu"><a class="kingster-top-bar-right-button" style="font-weight: normal; cursor: auto;" target="_blank">快速通道</a></li>
                    <li class="menu-item kingster-normal-menu"><a href="http://www.ct21.com.au/">潮流主页</a></li>
                    <li class="menu-item kingster-normal-menu"><a href="http://www.ct21.com.cn/">潮流留学</a></li>
                    <li class="menu-item kingster-normal-menu"><a href="http://www.ct21.cn">潮流移民</a></li>
                    <li class="menu-item kingster-normal-menu"><a href="http://www.ct21investment.com/">潮流投资</a></li>
                </ul>
                <div class="kingster-top-bar-right-social"></div></div>
        </div>
    </div>
</div>

<!-- ===============        (white) Navigation bar        =============== -->
<header class="kingster-header-wrap kingster-header-style-plain  kingster-style-menu-right kingster-sticky-navigation kingster-style-fixed" data-navigation-offset="75px">
    <div class="kingster-header-background"></div>
    <div class="kingster-header-container  kingster-container" style="padding-left: 0px; padding-right: 0px;">
        <div class="kingster-header-container-inner clearfix">
            <!-- ================================================================================ -->
            <!-- ==============================        Logo        ============================== -->
            <div class="animated fadeInUp kingster-logo  kingster-item-pdlr">
                <div class="kingster-logo-inner">
                    <a class="" href="./../cn/"><img src="custom-logo/logo_ct21.png" alt="" loading="lazy" /></a>
                </div>
            </div>
            <!-- ==============================        Logo        ============================== -->
            <!-- ================================================================================ -->
            <div class="kingster-navigation kingster-item-pdlr clearfix ">
                <div class="kingster-main-menu" id="kingster-main-menu">
                    <ul id="menu-main-navigation-1" class="sf-menu">
                        
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

                        <!-- 1st Menu [button] -->
                        <li class="menu-item menu-item-home menu-item-has-children kingster-normal-menu <?php echo $class_Home; ?>"><a href="./../cn/" class="sf-with-ul-pre">首 页</a>
                            <!-- <ul class="sub-menu">
                                <li class="menu-item menu-item-home" data-size="60"><a href="index.html">Homepage 1</a></li>
                                <li class="menu-item" data-size="60"><a href="homepage-2.html">Homepage 2</a></li>
                            </ul> -->
                        </li>
                        <!-- 2nd Menu [button] -->
                        <li class="menu-item menu-item-home menu-item-has-children kingster-normal-menu <?php echo $class_studySolu; ?>"><a href="./../cn/search-studySolution.php" class="sf-with-ul-pre">留学方案</a></li>
                        <!-- 3rd Menu [button] -->
                        <li class="menu-item menu-item-home menu-item-has-children kingster-normal-menu <?php echo $class_Course; ?>"><a href="./../cn/search-course.php" class="sf-with-ul-pre">课程搜索</a>
                            <!-- <ul class="sub-menu">
                                <li class="menu-item" data-size="60"><a href="./../cn/search-course2.php">课程 2</a></li>
                                <li class="menu-item" data-size="60"><a href="./../cn/search-course3.php">课程 3</a></li>
                            </ul> -->
                        </li>
                        <!-- 4th Menu [button] -->
                        <li class="menu-item menu-item-home menu-item-has-children kingster-normal-menu <?php echo $class_School; ?>"><a href="./../cn/search-school.php" class="sf-with-ul-pre">院校搜索</a></li>
                        <!-- 5th Menu [button] -->
                        <li class="menu-item menu-item-home menu-item-has-children kingster-normal-menu <?php echo $class_Immi; ?>"><a href="./../cn/search-immigration.php" class="sf-with-ul-pre">移民搜索</a></li>
                        <!-- 6th Menu [button] -->
                        <li class="menu-item menu-item-home menu-item-has-children kingster-normal-menu <?php echo $class_Fees; ?>"><a href="./../cn/search-fees.php" class="sf-with-ul-pre">学费搜索</a></li>
                        <!-- 7th Menu [button] -->
                        <li class="menu-item menu-item-has-children kingster-normal-menu <?php echo $class_ausInfo; ?>"><a href="#" class="sf-with-ul-pre">澳洲有关资讯</a>
                            <ul class="sub-menu">
                                <li class="menu-item" data-size="60"><a href="./../cn/info-university-ranking.php">大学排名 / 专业表现</a></li>
                                <li class="menu-item" data-size="60"><a href="./../cn/info-immigration-list.php">技术移民信息</a></li>
                                <li class="menu-item" data-size="60"><a href="./../cn/info-budget-courses.php">特价课程</a></li>
                                <li class="menu-item" data-size="60"><a href="./../cn/info-popular-courses.php">热门课程</a></li>
                            </ul>
                        </li>
                        <!-- 8th Menu [button] -->
                        <li class="menu-item menu-item-has-children kingster-normal-menu <?php echo $class_ausInfo; ?>">
                            <a href="<?php echo $verEng; ?>" class="sf-with-ul-pre"><i class="fa fa-globe" aria-hidden="true"></i>English</a>
                        </li>
                        <!-- <li class="menu-item menu-item-has-children kingster-normal-menu <?php echo $class_ausInfo; ?>"><a href="<?php echo $verEng; ?>" class="sf-with-ul-pre"><img src="custom-icon/flag_cn.png" width="38px" height="38px" loading="lazy" /></a> -->
                        <!-- 9th Menu [button] -->
                    </ul>

                    <div class="kingster-navigation-slide-bar" id="kingster-navigation-slide-bar"></div>
                </div>
                <!-- ====================  Search  ==================== -->
                <?php //include_once('navbar-search.php'); ?>
            </div>
        </div>
    </div>
</header>