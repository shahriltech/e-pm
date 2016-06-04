<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use kartik\time\TimePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Paperwork */
/* @var $form yii\widgets\ActiveForm */
?>
<span id="paperworkajkcreate" class="<?php echo Yii::$app->controller->id."/".Yii::$app->controller->action->id;?>"></span>
<div class="paperwork-form">

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
        <?= Html::submitButton($model->isNewRecord ? 'Hantar' : 'Kemaskini', ['class' =>'btn green-meadow','name'=>'hantar','value'=>'hantar']) ?> 
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
