<div class="kingster-mobile-header-wrap">
    <div class="kingster-mobile-header kingster-header-background kingster-style-slide kingster-sticky-mobile-navigation " id="kingster-mobile-header">
        <div class="kingster-mobile-header-container kingster-container clearfix">
            <!-- ================================================================================ -->
            <!-- ==============================        Logo        ============================== -->
            <div class="animated fadeInUp kingster-logo  kingster-item-pdlr">
                <div class="kingster-logo-inner">
                    <a class="" href="./../en/"><img src="custom-logo/logo_ct21.png" alt="" loading="lazy" /></a>
                </div>
            </div>
            <!-- ==============================        Logo        ============================== -->
            <!-- ================================================================================ -->
            <div class="kingster-mobile-menu-right">

                <!-- ====================  Search  ==================== -->
                <?php //include_once('navbar-search-mobile.php'); ;;;?>

                <!-- Check current page [for nav-item] --> <!-- [make blue line below] -->
                <?php

$class_Home = '';
$class_studySolu = '';
$class_Course = '';
$class_School = '';
$class_Immi = '';
$class_Fees = '';
if (strpos($_SERVER['PHP_SELF'], '/en/index') !== false) {
    $class_Home = 'current-menu-item';
}
if (strpos($_SERVER['PHP_SELF'], '/en/search-studySolution') !== false) {
    $class_studySolu = 'current-menu-item';
}
if (strpos($_SERVER['PHP_SELF'], '/en/search-course') !== false
    || strpos($_SERVER['PHP_SELF'], '/en/course') !== false) {
    $class_Course = 'current-menu-item';
}
if (strpos($_SERVER['PHP_SELF'], '/en/search-school') !== false
    || strpos($_SERVER['PHP_SELF'], '/en/school-info') !== false) {
    $class_School = 'current-menu-item';
}
if (strpos($_SERVER['PHP_SELF'], '/en/search-immigration') !== false) {
    $class_Immi = 'current-menu-item';
}
if (strpos($_SERVER['PHP_SELF'], '/en/search-fees') !== false) {
    $class_Fees = 'current-menu-item';
}

$class_ausInfo = '';
$allow = array('/en/info-', '/en/info-immigration-list', '/en/info-immigration-article', '/en/info-budget-courses', '/en/info-popular-courses');

foreach ($allow as $arrValue) {
    if (strpos($_SERVER['REQUEST_URI'], $arrValue) !== false) {
        $class_ausInfo = 'current-menu-item';
    }
}

$verCn = str_replace('en', 'cn', $_SERVER['PHP_SELF']);
// basename(__FILE__) = current file {navbar.php}
// $_SERVER['PHP_SELF'] = after .com {/en/index.php}, without any after '?'
// $_SERVER['REQUEST_URI'] = after .com {/en/index.php}
?>
                <div class="kingster-mobile-menu"><a class="kingster-mm-menu-button kingster-mobile-menu-button kingster-mobile-button-hamburger" href="#kingster-mobile-menu"><span></span></a>
                    <div class="kingster-mm-menu-wrap kingster-navigation-font" id="kingster-mobile-menu" data-slide="right">
                        <ul id="menu-main-navigation" class="m-menu">
                            <!-- 1st Menu [button] -->
                            <li class="menu-item menu-item-home menu-item-has-children <?php echo $class_Home; ?>"><a href="./../en/">Home</a>
                                <!-- <ul class="sub-menu">
                                    <li class="menu-item" data-size="60"><a href="./../en/index2.php">首页 2</a></li>
                                </ul> -->
                            </li>
                            <!-- 2nd Menu [button] -->
                            <li class="menu-item menu-item-has-children <?php echo $class_studySolu; ?>"><a href="./../en/search-studySolution.php">Pathway Search</a></li>
                            <!-- 3rd Menu [button] -->
                            <li class="menu-item menu-item-has-children <?php echo $class_Course; ?>"><a href="./../en/search-course.php">Courses Search</a></li>
                            <!-- 4th Menu [button] -->
                            <li class="menu-item menu-item-has-children <?php echo $class_School; ?>"><a href="./../en/search-school.php">Institutes Search</a></li>
                            <!-- 5th Menu [button] -->
                            <li class="menu-item menu-item-has-children <?php echo $class_Immi; ?>"><a href="./../en/search-immigration.php">Courses for Migration</a></li>
                            <!-- 6th Menu [button] -->
                            <li class="menu-item menu-item-has-children <?php echo $class_Fees; ?>"><a href="./../en/search-fees.php">Tuition Search</a></li>
                            <!-- 7th Menu [button] -->
                            <li class="menu-item menu-item-has-children <?php echo $class_ausInfo; ?>"><a href="#">Aus. Info</a>
                                <ul class="sub-menu">
                                    <li class="menu-item"><a href="./../en/info-university-ranking.php">Ranking / Statistics</a></li>
                                    <li class="menu-item"><a href="./../en/info-immigration-list.php">Skilled Migration Info.</a></li>
                                    <li class="menu-item"><a href="./../en/info-budget-courses.php">Budget Courses</a></li>
                                    <li class="menu-item"><a href="./../en/info-popular-courses.php">Popular Courses</a></li>
                                </ul>
                            </li>
                            <!-- 8th Menu [button] -->
                            <li class="menu-item menu-item-has-children <?php echo $class_ausInfo; ?>"><a href="<?php echo $verCn; ?>">
                                <i class="fa fa-globe" aria-hidden="true" style="color: white;"></i>  中文</a>
                            </li>
                            <!-- <li class="menu-item menu-item-has-children <?php echo $class_ausInfo; ?>"><a href="<?php echo $verCn; ?>"><img src="custom-icon/flag_cn.png" width="38px" height="38px" loading="lazy" /></a> -->
                            <!-- 9th Menu [button] -->
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>