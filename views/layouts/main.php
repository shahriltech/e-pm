<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\widgets\Menu;
use yii\bootstrap\Modal;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link href="//fonts.googleapis.com/css?family=Oswald:400,300,700" rel="stylesheet" type="text/css" />
    <?php $this->head() ?>
</head>
<?php $this->beginBody() ?>
<?php if(Yii::$app->user->isGuest == 1) { ?>
    <body class="login">
        <div class="logo">
                <a id="index" class="page-logo" href="index.html">
                    <img src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/assets/layouts/layout5/img/e-pm.png" alt="Logo">
                </a>
        </div>
        <!-- BEGIN LOGIN -->
        <div class="content">
            <br>
            <?= $content ?>
        </div>
        <center>
            <p class="copyright"><?= date('Y') ?>&copy;E-PM</p>
        </center>
    </body>
<?php } else if (Yii::$app->user->identity->role == 2) { ?>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-md">

    <!-- BEGIN CONTAINER -->
    <div class="wrapper">
        <!-- BEGIN HEADER -->
            <header class="page-header">
                <nav class="navbar mega-menu" role="navigation">
                    <div class="container-fluid">
                        <div class="clearfix navbar-fixed-top">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="toggle-icon">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </span>
                            </button>
                            <!-- End Toggle Button -->
                            <!-- BEGIN LOGO -->
                            <a id="index" class="page-logo" href="index.html">
                                <img src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/assets/layouts/layout5/img/e-pm.png" alt="Logo"> </a>
                            <!-- END LOGO -->
                            <!-- BEGIN TOPBAR ACTIONS -->
                            <div class="topbar-actions">
                                <!-- BEGIN USER PROFILE -->
                                <div class="btn-group-img btn-group">
                                    <button type="button" class="btn btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                        <span><?= Yii::$app->user->identity->username ?></span>
                                        <img src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/assets/layouts/layout5/img/avatar.png" alt="" ></button>
                                    <ul class="dropdown-menu-v2" role="menu">
                                        <li>
                                            <?= Html::a('<i class="icon-user"></i> Profile', ['userpwas/profile']) ?>
                                        </li>
                                        
                                        <li>
                                            <?= Html::a('<i class="icon-key"></i> Keluar', ['site/logout']) ?>
                                        </li>
                                    </ul>
                                </div>
                                <!-- END USER PROFILE -->
                            </div>
                            <!-- END TOPBAR ACTIONS -->
                        </div>
                        <!-- BEGIN HEADER MENU -->
                        <div class="nav-collapse collapse navbar-collapse navbar-responsive-collapse">
                            <?php
                                echo Menu::widget([
                                    'items' => [
                                        ['label' => 'Utama', 'url' => ['site/index']],
                                        ['label' => 'Kertas Kerja', 'url' => ['paperwork/index'],'options'=>['id'=>'ajkPaperwork']],
                                        ['label' => 'Status', 'url' => ['paperwork/status']],

                                    ],
                                    'activeCssClass'=>'active open selected',
                                    'activateParents'=>true,
                                    'encodeLabels' => false,
                                    'options' => [
                                            'class' => 'nav navbar-nav'
                                        ],
                                        'itemOptions'=>array('class'=>'text-uppercase'),
                                ]);
                            ?>
                        </div>
                        <!-- END HEADER MENU -->
                </div>
                    <!--/container-->
            </nav>
        </header>
            <!-- END HEADER -->
            <div class="container-fluid">
                <div class="page-content">
                    <?= $content ?>
                </div>
                <!-- BEGIN FOOTER -->
                <p class="copyright"><?= date('Y') ?>&copy;E-PM</p>
                <a href="#index" class="go2top">
                    <i class="icon-arrow-up"></i>
                </a>
                <!-- END FOOTER -->
            </div>
    </div><!-- END WRAPPER -->


</body>
<?php } else if (Yii::$app->user->identity->role == 3) { ?>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-md">

    <!-- BEGIN CONTAINER -->
    <div class="wrapper">
        <!-- BEGIN HEADER -->
            <header class="page-header">
                <nav class="navbar mega-menu" role="navigation">
                    <div class="container-fluid">
                        <div class="clearfix navbar-fixed-top">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="toggle-icon">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </span>
                            </button>
                            <!-- End Toggle Button -->
                            <!-- BEGIN LOGO -->
                            <a id="index" class="page-logo" href="index.html">
                                <img src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/assets/layouts/layout5/img/e-pm.png" alt="Logo"> </a>
                            <!-- END LOGO -->
                            
                            <!-- BEGIN TOPBAR ACTIONS -->
                            <div class="topbar-actions">
                                <!-- BEGIN USER PROFILE -->
                                <div class="btn-group-img btn-group">
                                    <button type="button" class="btn btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                        <span><?= Yii::$app->user->identity->username ?></span>
                                        <img src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/assets/layouts/layout5/img/avatar.png" alt="" ></button>
                                    <ul class="dropdown-menu-v2" role="menu">
                                        <li>
                                            <?= Html::a('<i class="icon-user"></i> Profile', ['userpwas/profileupdate','id'=>Yii::$app->user->identity->id]) ?>
                                        </li>
                                        
                                        <li>
                                            <?= Html::a('<i class="icon-key"></i> Keluar', ['site/logout']) ?>
                                        </li>
                                    </ul>
                                </div>
                                <!-- END USER PROFILE -->
                            </div>
                            <!-- END TOPBAR ACTIONS -->
                        </div>
                        <!-- BEGIN HEADER MENU -->
                        <div class="nav-collapse collapse navbar-collapse navbar-responsive-collapse">
                            <?php
                                echo Menu::widget([
                                    'items' => [
                                        ['label' => 'Utama', 'url' => ['site/index']],
                                        ['label' => 'Pengurusan Pengguna', 'url' => ['userpwas/index'],'options'=>['id'=>'submitpaper']],
                                        ['label' => 'Kertas Kerja', 'url' => ['paperwork/list'],'options'=>['id'=>'senaraikertas']],
                                        ['label' => 'Laporan', 'url' => ['paperwork/report']],

                                    ],
                                    'activeCssClass'=>'active open selected',
                                    'activateParents'=>true,
                                    'encodeLabels' => false,
                                    'options' => [
                                            'class' => 'nav navbar-nav'
                                        ],
                                        'itemOptions'=>array('class'=>'text-uppercase'),
                                ]);
                            ?>
                        </div>
                        <!-- END HEADER MENU -->
                </div>
                    <!--/container-->
            </nav>
        </header>
            <!-- END HEADER -->
            <div class="container-fluid">
                <div class="page-content">
                    <?= $content ?>
                </div>
                <!-- BEGIN FOOTER -->
                <p class="copyright"><?= date('Y') ?>&copy;E-PM</p>
                <a href="#index" class="go2top">
                    <i class="icon-arrow-up"></i>
                </a>
                <!-- END FOOTER -->
            </div>
    </div><!-- END WRAPPER -->


</body>

<?php } else if (Yii::$app->user->identity->role == 1) { ?>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-md">

    <!-- BEGIN CONTAINER -->
    <div class="wrapper">
        <!-- BEGIN HEADER -->
            <header class="page-header">
                <nav class="navbar mega-menu" role="navigation">
                    <div class="container-fluid">
                        <div class="clearfix navbar-fixed-top">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="toggle-icon">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </span>
                            </button>
                            <!-- End Toggle Button -->
                            <!-- BEGIN LOGO -->
                            <a id="index" class="page-logo" href="index.html">
                                <img src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/assets/layouts/layout5/img/e-pm.png" alt="Logo"> </a>
                            <!-- END LOGO -->
                            <!-- BEGIN TOPBAR ACTIONS -->
                            <div class="topbar-actions">
                                <!-- BEGIN USER PROFILE -->
                                <div class="btn-group-img btn-group">
                                    <button type="button" class="btn btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                        <span><?= Yii::$app->user->identity->username ?></span>
                                        <img src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/assets/layouts/layout5/img/avatar.png" alt="" ></button>
                                    <ul class="dropdown-menu-v2" role="menu">
                                        <li>
                                            <?= Html::a('<i class="icon-user"></i> Profile', ['userpwas/profileupdate','id'=>Yii::$app->user->identity->id]) ?>
                                        </li>
                                        
                                        <li>
                                            <?= Html::a('<i class="icon-key"></i> Keluar', ['site/logout']) ?>
                                        </li>
                                    </ul>
                                </div>
                                <!-- END USER PROFILE -->
                            </div>
                            <!-- END TOPBAR ACTIONS -->
                        </div>
                        <!-- BEGIN HEADER MENU -->
                        <div class="nav-collapse collapse navbar-collapse navbar-responsive-collapse">
                            <?php
                                echo Menu::widget([
                                    'items' => [
                                        ['label' => 'Utama', 'url' => ['site/index']],
                                        ['label' => 'Kertas Kerja',
                                            'url' => ['paperwork/submission'],
                                            'options'=>['id'=>'submit'],
                                            'template' => '<a href="{url}" class="href_class">{label}</a>',
                                                'items' => [
                                                    ['label' => 'Status Kertas Kerja', 'url' => ['paperwork/submission']],
                                                    ['label' => 'Senarai Kertas Kerja', 'url' => ['paperwork/list'],'options'=>['id'=>'senaraikertas']],
                                                ]
                                        ],
                                        ['label' => 'Laporan',
                                             'url' => ['paperwork/report'],
                                             'options'=>['id'=>'report']                                            
                                        ],

                                    ],
                                    'activeCssClass'=>'dropdown dropdown-fw active open selected',
                                    'activateParents'=>true,
                                    'encodeLabels' => false,
                                    'options' => [
                                            'class' => 'nav navbar-nav'
                                        ],
                                        'submenuTemplate' => "\n<ul class='dropdown-menu dropdown-menu-fw' role='menu'>\n{items}\n</ul>\n",
                                        'itemOptions'=>array('class'=>'text-uppercase'),
                                ]);
                            ?>
                        </div>
                        <!-- END HEADER MENU -->
                </div>
                    <!--/container-->
            </nav>
        </header>
            <!-- END HEADER -->
            <div class="container-fluid">
                <div class="page-content">
                    <?= $content ?>
                </div>
                <!-- BEGIN FOOTER -->
                <p class="copyright"><?= date('Y') ?>&copy;E-PM</p>
                <a href="#index" class="go2top hidden-xs">
                    <i class="icon-arrow-up"></i>
                </a>
                <!-- END FOOTER -->
            </div>
    </div><!-- END WRAPPER -->


</body>
<?php }?>
<?php $this->endBody() ?>
</html>

<!-- BEGIN CORE PLUGINS 
<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/assets/global/plugins/jquery.min.js" type="text/javascript"></script>-->
<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/assets/global/plugins/moment.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/assets/global/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.ms.min.js" type="text/javascript"></script>

<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>

<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/assets/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>  
<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<!--<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
-->
<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>

<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS --> 
<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/assets/pages/scripts/dashboard.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/assets/pages/scripts/login.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/assets/pages/scripts/profile.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>

<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/assets/pages/scripts/ui-buttons.min.js" type="text/javascript"></script>

<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->     
<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/assets/layouts/layout5/scripts/layout.min.js" type="text/javascript"></script>       
<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>       
<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>       
<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/assets/pages/scripts/form-input-mask.js" type="text/javascript"></script>       

<!-- END THEME LAYOUT SCRIPTS -->
<?php 
  Modal::begin([
   // Tambah Pengalaman (popup)
    'header'=>'<h4>Nyatakan Sebab Tidak Meluluskan Kertas Kerja Ini.</h4>',
    'id' => 'tdaklulus',
    'size' => 'modal-md',
    
    'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
]);
echo "<div id='modalC'></div>";
Modal::end();
?>
<?php
Modal::begin([
   // Tambah Pengalaman (popup)
    'header'=>'<h4>Adakah Anda Pasti Untuk Meluluskan Kertas Kerja Ini ?</h4>',
    'id' => 'lulus',
    'size' => 'modal-md',
    
    'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
]);
echo "<div id='modalD'></div>";
Modal::end();
$this->endPage() ?>

