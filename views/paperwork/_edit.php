<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use kartik\time\TimePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Paperwork */
/* @var $form yii\widgets\ActiveForm */
?>
<?php if (Yii::$app->user->identity->role == 1) { ?>
    <span id="paperworkView" class="<?php echo Yii::$app->controller->id."/".Yii::$app->controller->action->id;?>"></span>
<?php }elseif(Yii::$app->user->identity->role == 3){ ?>
    <span id="paperworkadminView" class="<?php echo Yii::$app->controller->id."/".Yii::$app->controller->action->id;?>"></span>
<?php }elseif(Yii::$app->user->identity->role == 2){?>
    <span id="paperworkajkView" class="<?php echo Yii::$app->controller->id."/".Yii::$app->controller->action->id;?>"></span>
<?php }?>

<?php if ($model->pw_submit_status === 'Telah Di Hantar') { ?>
    <div class="paperwork-form">
        <?php if(Yii::$app->user->identity->role == 2) {
            if($model->status_by_nazir == 0){?>
                <div class="note note-success">
                    Kertas kerja anda telah di terima oleh pihak pengurusan. Sila tunggu kelulusan dari pihak pengurusan (Nazir) dan sila rujuk di menu <strong>Status</strong> untuk mengetahui status kelulusan anda.
                </div>
        <?php } elseif($model->status_by_nazir == 1){?>
                <div class="note note-success">
                    Kertas kerja anda telah di luluskan oleh pihak pengurusan. Sila rujuk di menu <strong>Status</strong> untuk cetakan sebagai rujukan anda.
                </div>
        <?php } else{?>
                <div class="alert alert-danger">
                    Harap Maaf. Permohonan kertas kerja anda tidak luluskan. Berikut adalah sebab kertas kerja anda tidak diluluskan.<br>
                    <?php if (isset($model2->sebab) ) {
                            echo $model2->sebab;
                        } else{
                            "";
                    }?>
                </div>
        <?php }} elseif(Yii::$app->user->identity->role == 3){ 
                if($model->status_by_nazir == 0){?>
                <div class="note note-success">
                    Kertas kerja telah di terima oleh pihak pengurusan. Kemaskini maklumat tidak di benarkan.
                </div>
        <?php } elseif($model->status_by_nazir == 1){?>
                <div class="note note-success">
                    Kertas kerja anda telah di luluskan oleh pihak pengurusan. Sila rujuk di menu <strong>Laporan</strong> untuk cetakan sebagai rujukan anda.
                </div>
        <?php } else{?>
                <div class="alert alert-danger">
                    Harap Maaf. Permohonan kertas kerja tidak luluskan. Berikut adalah sebab kertas kerja tidak diluluskan.<br>
                    <?php if (isset($model2->sebab) ) {
                        echo $model2->sebab;
                    } else{
                        "";
                    }?>
                </div>
        <?php }}?>
        <?php $form = ActiveForm::begin([
            'enableAjaxValidation' => false,
            'enableClientValidation' => false,]); ?>
        <div class="row">
            <div class="portlet-body form">
                <div class="form-body">
                    <div class="col-md-12">
                        <div class="form-group form-md-line-input">
                            <?= Html::activeTextInput($model,'nama_program',['class'=>'form-control','disabled'=>'']); ?>
                                <label for="form_control_1"><?= Html::activeLabel($model,'nama_program'); ?></label>
                                <span class="help-block"><?= Html::error($model,'nama_program'); ?></span>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    <div class="row">
        <div class="portlet-body form">
            <div class="form-body">
                <div class="col-md-3">
                    <div class="form-group form-md-line-input">
                        <?= DatePicker::widget([
                                'name'  => 'Paperwork[pw_startdate]',
                                'value'=>$model->pw_startdate,
                                'options' => ['class'=>'form-control','date-picker','data-date-format' => 'dd/mm/yyyy','disabled'=>''],
                               
                              ]);
                         ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'pw_startdate'); ?></label>
                            <span class="help-block"><?= Html::error($model,'pw_startdate'); ?></span>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group form-md-line-input">
                        <?= DatePicker::widget([
                                'name'  => 'Paperwork[pw_endDate]',
                                'value'=>$model->pw_endDate,
                                'options' => ['class'=>'form-control','date-picker','data-date-format' => 'dd/mm/yyyy','disabled'=>''],
                               
                              ]);
                         ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'pw_endDate'); ?></label>
                            <span class="help-block"><?= Html::error($model,'pw_endDate'); ?></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'jangka_masa',['class'=>'form-control','disabled'=>'']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'jangka_masa'); ?></label>
                            <span class="help-block"><?= Html::error($model,'jangka_masa'); ?></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'pw_budget',['class'=>'form-control','placeholder'=>'RM ...','disabled'=>'']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'pw_budget'); ?></label>
                            <span class="help-block"><?= Html::error($model,'pw_budget'); ?></span>
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
                        <?= Html::activeTextArea($model,'pw_obj',['class'=>'form-control','rows'=>'6','placeholder'=>"",'disabled'=>'']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'pw_obj'); ?></label>
                            <span class="help-block"><?= Html::error($model,'pw_obj'); ?></span>
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
                        <?= Html::activeTextArea($model,'pw_background',['class'=>'form-control','rows'=>'6','disabled'=>'']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'pw_background'); ?></label>
                            <span class="help-block"><?= Html::error($model,'pw_background'); ?></span>
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
                        <?= Html::activeTextArea($model,'pw_justifikasi',['class'=>'form-control','rows'=>'6','disabled'=>'']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'pw_justifikasi'); ?></label>
                            <span class="help-block"><?= Html::error($model,'pw_justifikasi'); ?></span>
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
                        <?= Html::activeTextArea($model,'pw_advantage',['class'=>'form-control','rows'=>'6','disabled'=>'']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'pw_advantage'); ?></label>
                            <span class="help-block"><?= Html::error($model,'pw_advantage'); ?></span>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

        <?php ActiveForm::end(); ?>

    </div>
<?php } else{ ?>
        <div class="paperwork-form">
        <div class="alert alert-danger">
            <strong>Amaran ! </strong> Kertas kerja anda masih belum di hantar ke pihak pengurusan. Sila klik butang hantar untuk pihak pengurusan menerima dan semak serta mengesahkan kertas kerja anda. Atau, anda boleh mengemaskini dan simpan untuk proses semakan semula. <strong>Borang yang telah di hantar tidak boleh di kemaskini.</strong>
        </div>
        <?php $form = ActiveForm::begin([
            'enableAjaxValidation' => false,
            'enableClientValidation' => false,]); ?>
            <?= $form->errorSummary($model,['class'=>'alert alert-danger','header'=>'']); ?>
        <div class="row">
            <div class="portlet-body form">
                <div class="form-body">
                    <div class="col-md-12">
                        <div class="form-group form-md-line-input">
                            <?= Html::activeTextInput($model,'nama_program',['class'=>'form-control']); ?>
                                <label for="form_control_1"><?= Html::activeLabel($model,'nama_program'); ?></label>
                                <span class="help-block"><?= Html::error($model,'nama_program'); ?></span>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    <div class="row">
        <div class="portlet-body form">
            <div class="form-body">
                <div class="col-md-3">
                    <div class="form-group form-md-line-input">
                        <?= DatePicker::widget([
                                'name'  => 'Paperwork[pw_startdate]',
                                'value'=>$model->pw_startdate,
                                'options' => ['class'=>'form-control','date-picker','data-date-format' => 'dd/mm/yyyy'],
                               
                              ]);
                         ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'pw_startdate'); ?></label>
                            <span class="help-block"><?= Html::error($model,'pw_startdate'); ?></span>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group form-md-line-input">
                        <?= DatePicker::widget([
                                'name'  => 'Paperwork[pw_endDate]',
                                'value'=>$model->pw_endDate,
                                'options' => ['class'=>'form-control','date-picker','data-date-format' => 'dd/mm/yyyy'],
                               
                              ]);
                         ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'pw_endDate'); ?></label>
                            <span class="help-block"><?= Html::error($model,'pw_endDate'); ?></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'jangka_masa',['class'=>'form-control']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'jangka_masa'); ?></label>
                            <span class="help-block"><?= Html::error($model,'jangka_masa'); ?></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'pw_budget',['class'=>'form-control','placeholder'=>'RM ...']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'pw_budget'); ?></label>
                            <span class="help-block"><?= Html::error($model,'pw_budget'); ?></span>
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
                        <?= Html::activeTextArea($model,'pw_obj',['class'=>'form-control','rows'=>'6','placeholder'=>""]); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'pw_obj'); ?></label>
                            <span class="help-block"><?= Html::error($model,'pw_obj'); ?></span>
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
                        <?= Html::activeTextArea($model,'pw_background',['class'=>'form-control','rows'=>'6']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'pw_background'); ?></label>
                            <span class="help-block"><?= Html::error($model,'pw_background'); ?></span>
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
                        <?= Html::activeTextArea($model,'pw_justifikasi',['class'=>'form-control','rows'=>'6']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'pw_justifikasi'); ?></label>
                            <span class="help-block"><?= Html::error($model,'pw_justifikasi'); ?></span>
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
                        <?= Html::activeTextArea($model,'pw_advantage',['class'=>'form-control','rows'=>'6']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'pw_advantage'); ?></label>
                            <span class="help-block"><?= Html::error($model,'pw_advantage'); ?></span>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
        
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Kemaskini', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            <?= Html::submitButton('Hantar', ['class' =>'btn green-meadow','name'=>'hantar','value'=>'hantar']) ?> 

        </div>

        <?php ActiveForm::end(); ?>

    </div>
<?php }?>