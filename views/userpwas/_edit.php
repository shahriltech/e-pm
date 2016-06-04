<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\LookupRole;
use app\models\LookupPosition;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Userpwas */
/* @var $form yii\widgets\ActiveForm */
$role = ArrayHelper::map(LookupRole::find()->asArray()->all(),'id','role'); //retrieve data from table look_up_pendapatan
$position = ArrayHelper::map(LookupPosition::find()->where(['position_id'=>$model->position_id])->asArray()->all(),'position_id','position'); //retrieve data from table look_up_pendapatan
?>
<script type="text/javascript">

</script>
<span id="paperworkadmincreate" class="<?php echo Yii::$app->controller->id."/".Yii::$app->controller->action->id;?>"></span>
<div class="userpwas-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->errorSummary($model,['class'=>'alert alert-danger','header'=>'']); ?>
    <div class="row">
        <div class="portlet-body form">
            <div class="form-body">
                <div class="col-md-12">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'fullname',['class'=>'form-control']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'fullname'); ?> <span class="required">*</span></label>
                            <span class="help-block"><?= Html::error($model,'fullname'); ?></span>
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
                        <?= Html::activeTextInput($model,'ic_no',['class'=>'form-control']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'ic_no'); ?> <span class="required">*</span></label>
                            <span class="help-block"><?= Html::error($model,'ic_no'); ?></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'username',['class'=>'form-control']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'username'); ?> <span class="required">*</span></label>
                            <span class="help-block"><?= Html::error($model,'username'); ?></span>
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
                        <?= Html::activeTextInput($model,'email',['class'=>'form-control']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'email'); ?> <span class="required">*</span></label>
                            <span class="help-block"><?= Html::error($model,'email'); ?></span>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="row">
        <div class="portlet-body form">
            <div class="form-body">
                <div class="col-md-6">
                    <div class='form-group form-md-line-input'>
                        <?= Html::activeDropDownList($model, 'role', $role, 
                            [
                                'prompt'=>'--Sila Pilih--',
                                'class'=>'form-control',
                                'onchange'=>'$.get( "'.Url::toRoute('lookup-position/list').'",{ id: $(this).val() } ).done(function( data ){$( "select#userpwas-position_id" ).html( data );});'

                            ]); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'role'); ?> <span class="required">*</span></label>
                            <span class="help-block"><?= Html::error($model,'role'); ?></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class='form-group form-md-line-input'>
                        <?= Html::activeDropDownList($model, 'position_id', $position, 
                            [
                                'prompt'=>'--Sila Pilih--',
                                'class'=>'form-control',
                                //'onchange'=>'$.get( "'.Url::toRoute('lookup-position/list').'",{ id: $(this).val() } ).done(function( data ){$( "select#userpwas-position_id" ).html( data );});'

                            ]); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'position_id'); ?> <span class="required">*</span></label>
                            <span class="help-block"><?= Html::error($model,'position_id'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Kemaskini', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

