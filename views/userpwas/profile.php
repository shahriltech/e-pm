<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
?>
<?php                                                    
    foreach ($model as $key => $value) {
        //$id = $value['id'];
        $ic_no =  $value['ic_no'];
        $fullname = $value['fullname'];
        $username = $value['username'];
        $role = $value['jenis'];
        $position = $value['position'];
        $email = $value['email'];
    }
?>
<!-- BEGIN BREADCRUMBS -->
<div class="breadcrumbs">
    <h1>Maklumat Profil</h1>
        <ol class="breadcrumb">
            <li>
                <?= Html::a('Halaman Utama', ['site/index']) ?>
            </li>
            <li>
                <a href="#">Profil</a>
            </li>
            <li class="active">Pengguna</li>
        </ol>
</div>
<!-- END BREADCRUMBS -->
<div class="row">
    <div class="col-md-12">
    	<!-- BEGIN PROFILE SIDEBAR -->
        <div class="profile-sidebar">
         	<!-- PORTLET MAIN -->
            <div class="portlet light bordered profile-sidebar-portlet ">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <img src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/assets/layouts/layout5/img/avatar.png" class="img-responsive" alt="">
                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name dark"><?php echo $fullname; ?> </div>
                        <div class="profile-usertitle-job"><?php echo $position; ?> </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="active">
                            <a href="#">
                                <i class="icon-home"></i> Maklumat Profil </a>
                        </li>
                        <li>
                            <?= Html::a('<i class="icon-settings"></i>Tetapan Akaun', ['userpwas/profileupdate','id'=>Yii::$app->user->identity->id]) ?>
                        </li>
                   	</ul>
                </div>
                <!-- END MENU -->
            </div>
            <!-- PORTLET MAIN -->
            
        <!-- END PORTLET MAIN -->
        </div>
        <div class='row'>
            <div class='col-md-7'>
                <div class="portlet light bordered ">
                <!-- STAT -->
                <div class="row list-separated profile-stat">
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="uppercase profile-stat-title"><?= $count_paperwork ?> </div>
                            <div class="uppercase profile-stat-text"> Kertas Kerja </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="uppercase profile-stat-title"><?= $paperwork_approved ?></div>
                            <div class="uppercase profile-stat-text"> Lulus </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="uppercase profile-stat-title"><?= $paperwork_pending?></div>
                            <div class="uppercase profile-stat-text"> Belum Di Luluskan</div>
                     </div>
                </div>
                <!-- END STAT -->
                <div>
                    <h4 class="">Mengenai <?php echo $fullname;  ?></h4>
                        <span class="profile-desc-text">Nama Samaran :&nbsp;<?php echo $username; ?></span><br>
                        <span class="profile-desc-text">Jawatan :&nbsp;<?php echo $position; ?></span><br>
                        <span class="profile-desc-text">Peranan :&nbsp;<?php echo $role; ?></span><br>
                    <div class="margin-top-20 profile-desc-link">
                        <i class="fa fa-envelope"></i>
                            <a href="https://mail.google.com/mail/u/0/#inbox" target='_blank'><?php echo $email; ?></a>
                    </div>
                </div>
            </div>
            </div>
        </div>
        
    </div>
    <div>
    </div>
</div>