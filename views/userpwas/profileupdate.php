<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use app\models\LookupRole;
use app\models\LookupPosition;

$role = ArrayHelper::map(LookupRole::find()->asArray()->all(),'id','role'); //retrieve data from table look_up_pendapatan
$pos = ArrayHelper::map(LookupPosition::find()->where(['position_id'=>$model_update->position_id])->asArray()->all(),'position_id','position'); //retrieve data from table look_up_pendapatan

?>

<?php                                                    
   /* foreach ($model as $key => $value) {
        //$id = $value['id'];
        $ic_no =  $value['ic_no'];
        $fullname = $value['fullname'];
        $username = $value['username'];
        $role = $value['jenis'];
        $position = $value['position'];
        $email = $value['email'];
    }*/
?>
<!-- BEGIN BREADCRUMBS -->
<div class="breadcrumbs">
    <h1>Kemaskini Profil</h1>
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
                    <div class="profile-usertitle-name dark"><?= $model_update->fullname ?> </div>
                        <div class="profile-usertitle-job"><?= $modelposition->position ?> </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav">
                        <?php if(Yii::$app->user->identity->role == 1 || Yii::$app->user->identity->role == 3 ){ ?>
                        <li class="active">
                            <?= Html::a('<i class="icon-settings"></i>Maklumat Profil', ['userpwas/profileupdate','id'=>Yii::$app->user->identity->id]) ?>
                        </li>
                        <?php }else if(Yii::$app->user->identity->role == 2){?>
                        <li>
                            <?= Html::a('<i class="icon-settings"></i>Maklumat Profil', ['userpwas/profile','id'=>Yii::$app->user->identity->id]) ?>
                        </li>
                        <li class='active'>
                            <?= Html::a('<i class="icon-settings"></i>Tetapan Akaun', ['userpwas/profileupdate','id'=>Yii::$app->user->identity->id]) ?>
                        </li>
                        <?php }?>
                   	</ul>
                </div>
                <!-- END MENU -->
            </div>
            <!-- PORTLET MAIN -->
            
        <!-- END PORTLET MAIN -->
        </div>
        <div class='row'>
            <div class='col-md-8'>
                <div class="portlet light bordered">
                    <div class="portlet-title tabbable-line">
                        <div class="caption caption-md">
                            <i class="icon-globe theme-font hide"></i>
                                <span class="caption-subject font-blue-madison bold uppercase">Akaun Profil</span>
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab_1_1" data-toggle="tab">Maklumat Diri</a>
                            </li>
                            <li>
                                <a href="#tab_1_3" data-toggle="tab">Tukar Password</a>
                            </li>
                        </ul>
                    </div>
                    <div class="portlet-body">
                        <div class="tab-content">
                            <!-- PERSONAL INFO TAB -->
                            <div class="tab-pane active" id="tab_1_1">
                                <?php if(Yii::$app->session->hasFlash('profileupdate')):?>
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert"></button>
                                         <?php echo  Yii::$app->session->getFlash('profileupdate'); ?>
                                    </div>
                                <?php endif; ?>
                                <div class="userpwas-form">
                                <?php $form = ActiveForm::begin(); ?>
                                    <?= $form->errorSummary($model_update,['class'=>'alert alert-danger','header'=>'']); ?>
                                    <div class="row">
                                        <div class="portlet-body form">
                                            <div class="form-body">
                                                <div class="col-md-6">
                                                    <div class="form-group form-md-line-input">
                                                        <?= Html::activeTextInput($model_update,'ic_no',['class'=>'form-control']); ?>
                                                            <label for="form_control_1"><?= Html::activeLabel($model_update,'ic_no'); ?> <span class="required">*</span></label>
                                                            <span class="help-block"><?= Html::error($model_update,'ic_no'); ?></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-md-line-input">
                                                        <?= Html::activeTextInput($model_update,'username',['class'=>'form-control']); ?>
                                                            <label for="form_control_1"><?= Html::activeLabel($model_update,'username'); ?> <span class="required">*</span></label>
                                                            <span class="help-block"><?= Html::error($model_update,'username'); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="portlet-body form">
                                            <div class="form-body">
                                                <div class="col-md-12">
                                                    <div class="form-group form-md-line-input">
                                                        <?= Html::activeTextInput($model_update,'fullname',['class'=>'form-control']); ?>
                                                            <label for="form_control_1"><?= Html::activeLabel($model_update,'fullname'); ?> <span class="required">*</span></label>
                                                            <span class="help-block"><?= Html::error($model_update,'fullname'); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="portlet-body form">
                                            <div class="form-body">
                                                <div class="col-md-12">
                                                    <div class="form-group form-md-line-input">
                                                        <?= Html::activeTextInput($model_update,'email',['class'=>'form-control']); ?>
                                                            <label for="form_control_1"><?= Html::activeLabel($model_update,'email'); ?> <span class="required">*</span></label>
                                                            <span class="help-block"><?= Html::error($model_update,'email'); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="portlet-body form">
                                            <div class="form-body">
                                                <div class="col-md-6">
                                                    <div class="form-group form-md-line-input">
                                                        <?= Html::activeDropDownList($model_update, 'role', $role, 
                                                            [
                                                                'prompt'=>'--Sila Pilih--',
                                                                'class'=>'form-control',
                                                                'id'=>'role_action',
                                                                'onchange'=>'$.get( "'.Url::toRoute('lookup-position/list').'",{ id: $(this).val() } ).done(function( data ){$( "select#userpwas-position_id" ).html( data );});'

                                                            ]); ?>
                                                            <label for="form_control_1"><?= Html::activeLabel($model_update,'role'); ?> <span class="required">*</span></label>
                                                            <span class="help-block"><?= Html::error($model_update,'role'); ?></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-md-line-input">
                                                            <?= Html::activeDropDownList($model_update, 'position_id', $pos, 
                                                            [
                                                                'prompt'=>'Sila Pilih',
                                                                'class'=>'form-control',
                                                            ]); ?>
                                                            <label for="form_control_1"><?= Html::activeLabel($model_update,'position_id'); ?> <span class="required">*</span></label>
                                                            <span class="help-block"><?= Html::error($model_update,'position_id'); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    

                                    <div class="form-group">
                                        <?= Html::submitButton($model_update->isNewRecord ? 'Simpan' : 'Kemaskini', ['class' => $model_update->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                                    </div>

                                    <?php ActiveForm::end(); ?>
                                </div>
                            </div>
                            <!-- END PERSONAL INFO TAB -->
                            <!-- CHANGE PASSWORD TAB -->
                            <div class="tab-pane" id="tab_1_3">
                                <div class="userpass-form">

                                    <?php $form = ActiveForm::begin(); ?>
                                    <div class="row">
                                        <div class="portlet-body form">
                                            <div class="form-body">
                                                <div class='col-md-6'>
                                                    <div class="form-group form-md-line-input">
                                                        <?= Html::activePasswordInput($model_pass,'pass',['class'=>'form-control']); ?>
                                                            <label for="form_control_1">Old Password</label>
                                                            <span class="help-block"><?= Html::error($model_pass,'pass'); ?></span>
                                                    </div>
                                                </div>
                                                <div class='col-md-6'>
                                                    <div class="form-group form-md-line-input">
                                                        <?= Html::activePasswordInput($model_update,'password_hash',['class'=>'form-control']); ?>
                                                            <label for="form_control_1">New Password</label>
                                                            <span class="help-block"><?= Html::error($model_update,'password_hash'); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <?= Html::submitButton($model_pass->isNewRecord ? 'Create' : 'Kemaskini', ['class' => $model_pass->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                                    </div>

                                    <?php ActiveForm::end(); ?>

                                </div>
                            </div>
                                                    <!-- END CHANGE PASSWORD TAB -->
                                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

