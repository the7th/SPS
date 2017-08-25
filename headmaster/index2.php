<?php
session_start();
if(isset($_SESSION['username']));
else
    header("location:../login.php");
include("../connect.php");
$headmaster = $_SESSION['username'];
$findUsername = mysql_query("SELECT * FROM users WHERE username='$headmaster'");
$username = mysql_fetch_array($findUsername);

$findClassList = mysql_query("SELECT * FROM form ORDER BY ClassName ASC");
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>SPS</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="../global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="../global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="../global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="../global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="../global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <link href="../global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
    <link href="../global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="../global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="../global/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="../layout/css/layout.min.css" rel="stylesheet" type="text/css" />
    <link href="../layout/css/themes/blue.min.css" rel="stylesheet" type="text/css" id="style_color" />
    <link href="../layout/css/custom.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico" /> </head>
<!-- END HEAD -->

<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">

            <!--                        <span class="logo-default" style="font-size: 50px">&nbsp;&nbsp;SPS</span>-->

            <div class="menu-toggler sidebar-toggler">
                <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
        <!-- END RESPONSIVE MENU TOGGLER -->

        <!-- BEGIN PAGE TOP -->
        <div class="page-top">

            <?php include('../nav/nav-metronic.php') ?>
        </div>
        <!-- END PAGE TOP -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER -->
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <?php include('../nav/nav-sidebar-metronic.php') ?>
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->

            <h1 class="page-title"> Welcome,
                <small>Here's your school.</small>
            </h1>

            <!-- END PAGE HEADER-->
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat2 ">
                        <div class="display">
                            <div class="number">
                                <h3 class="font-green-sharp">
                                    <span data-counter="counterup" data-value="50">0</span>
                                </h3>
                                <small>TOTAL STUDENTS</small>
                            </div>
                            <div class="icon">
                                <i class="icon-pie-chart"></i>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="progress">
                                        <span style="width: 76%;" class="progress-bar progress-bar-success green-sharp">
                                            <span class="sr-only">76% progress</span>
                                        </span>
                            </div>
                            <div class="status">
                                <div class="status-title"> progress </div>
                                <div class="status-number"> 76% </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat2 ">
                        <div class="display">
                            <div class="number">
                                <h3 class="font-red-haze">
                                    <span data-counter="counterup" data-value="65.5">0</span>
                                </h3>
                                <small>AVERAGE SCORE</small>
                            </div>
                            <div class="icon">
                                <i class="icon-like"></i>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="progress">
                                        <span style="width: 85%;" class="progress-bar progress-bar-success red-haze">
                                            <span class="sr-only">85% change</span>
                                        </span>
                            </div>
                            <div class="status">
                                <div class="status-title"> change </div>
                                <div class="status-number"> 85% </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat2 ">
                        <div class="display">
                            <div class="number">
                                <h3 class="font-blue-sharp">
                                    <span data-counter="counterup" data-value="93"></span>
                                </h3>
                                <small>HIGHEST SCORE</small>
                            </div>
                            <div class="icon">
                                <i class="icon-badge"></i>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="progress">
                                        <span style="width: 45%;" class="progress-bar progress-bar-success blue-sharp">
                                            <span class="sr-only">45% grow</span>
                                        </span>
                            </div>
                            <div class="status">
                                <div class="status-title"> grow </div>
                                <div class="status-number"> 45% </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat2 ">
                        <div class="display">
                            <div class="number">
                                <h3 class="font-purple-soft">
                                    <span data-counter="counterup" data-value="2"></span>
                                </h3>
                                <small>LOWEST SCORE</small>
                            </div>
                            <div class="icon">
                                <i class="icon-dislike"></i>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="progress">
                                        <span style="width: 57%;" class="progress-bar progress-bar-success purple-soft">
                                            <span class="sr-only">56% change</span>
                                        </span>
                            </div>
                            <div class="status">
                                <div class="status-title"> change </div>
                                <div class="status-number"> 57% </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-xs-12 col-sm-12">
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption">
                                <span class="caption-subject bold uppercase font-dark">Scores Over Time</span>
                                <span class="caption-helper">Average scores student get year by year</span>
                            </div>

                        </div>
                        <div class="portlet-body">
                            <p>Line chart showing scores of student every year</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xs-12 col-sm-12">
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption ">
                                <span class="caption-subject font-dark bold uppercase">Subjects Performance</span>
                                <span class="caption-helper">Subjects performance graph</span>
                            </div>

                        </div>
                        <div class="portlet-body">

                            <p>Histogram of subject. Lowest to highest.</p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-xs-12 col-sm-12">
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption">
                                <span class="caption-subject bold uppercase font-dark">Class</span>
                                <span class="caption-helper">List of class</span>
                            </div>

                        </div>
                        <div class="portlet-body">

                            <ul>
                                <?php while($classList = mysql_fetch_array($findClassList)){ ?>
                                    <li><a href="kelas.php?FormID=<?php echo $classList['FormID']; ?>"><?php echo $classList['ClassName'];?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>



        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->

</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner"> 2017 &copy; Albukhary Foundation
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
    </div>
    <!-- END FOOTER -->

    <!--[if lt IE 9]>
    <script src="../global/plugins/respond.min.js"></script>
    <script src="../global/plugins/excanvas.min.js"></script>
    <script src="../global/plugins/ie8.fix.min.js"></script>
    <![endif]-->
    <!-- BEGIN CORE PLUGINS -->
    <script src="../global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="../global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../global/plugins/js.cookie.min.js" type="text/javascript"></script>
    <script src="../global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="../global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="../global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="../global/plugins/moment.min.js" type="text/javascript"></script>
    <script src="../global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
    <script src="../global/plugins/morris/morris.min.js" type="text/javascript"></script>
    <script src="../global/plugins/morris/raphael-min.js" type="text/javascript"></script>
    <script src="../global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
    <script src="../global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
    <script src="../global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
    <script src="../global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>
    <script src="../global/plugins/amcharts/amcharts/pie.js" type="text/javascript"></script>
    <script src="../global/plugins/amcharts/amcharts/radar.js" type="text/javascript"></script>
    <script src="../global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript"></script>
    <script src="../global/plugins/amcharts/amcharts/themes/patterns.js" type="text/javascript"></script>
    <script src="../global/plugins/amcharts/amcharts/themes/chalk.js" type="text/javascript"></script>
    <script src="../global/plugins/amcharts/ammap/ammap.js" type="text/javascript"></script>
    <script src="../global/plugins/amcharts/ammap/maps/js/worldLow.js" type="text/javascript"></script>
    <script src="../global/plugins/amcharts/amstockcharts/amstock.js" type="text/javascript"></script>
    <script src="../global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
    <script src="../global/plugins/horizontal-timeline/horizontal-timeline.js" type="text/javascript"></script>
    <script src="../global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
    <script src="../global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
    <script src="../global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
    <script src="../global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
    <script src="../global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
    <script src="../global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
    <script src="../global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
    <script src="../global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
    <script src="../global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
    <script src="../global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
    <script src="../global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
    <script src="../global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="../global/scripts/app.min.js" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="../pages/scripts/dashboard.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <script src="../layout/scripts/layout.min.js" type="text/javascript"></script>
    <script src="../layout/scripts/demo.min.js" type="text/javascript"></script>
    <script src="../global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
    <script src="../global/scripts/quick-nav.min.js" type="text/javascript"></script>
    <!-- END THEME LAYOUT SCRIPTS -->
</body>

</html>