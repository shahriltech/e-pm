<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\PaperworkSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
 
$this->registerJs(
   '$("document").ready(function(){ 
        $("#caripaper").on("pjax:end", function() {
            $.pjax.reload({container:"#listpaperwork"});  //Reload GridView
        });
    });'
);
?>
<div class="paperwork-search">
    <?php $form = ActiveForm::begin([
        'action' => ['report'],
        'method' => 'get',
        'options' => ["data-pjax"=>true],
    ]); ?>
        <?= $model->pw_yearApprove = '';
            $model->pw_monthlyApprove = '';
            $model->pw_dateUpdated = '';
        ?>
        <div class="row">
            <div class="portlet-body">
                    <div class="col-sm-3">
                        <label for="form_control_1"><?= Html::activeLabel($model,'pw_yearApprove'); ?></label>
                        <div class="input-group input-medium date date-picker">
                            <?= Html::activeTextInput($model,'pw_yearApprove',['class'=>'form-control year']); ?>
                            <span class="input-group-btn">
                                <button class="btn default" type="button">
                                    <i class="fa fa-calendar"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <label for="form_control_1"><?= Html::activeLabel($model,'pw_monthlyApprove'); ?></label>
                        <div class="input-group input-medium date date-picker">
                            <?= Html::activeTextInput($model,'pw_monthlyApprove',['class'=>'form-control month']); ?>
                            <span class="input-group-btn">
                                <button class="btn default" type="button">
                                    <i class="fa fa-calendar"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <label for="form_control_1"><?= Html::activeLabel($model,'pw_dateUpdated'); ?></label>
                        <div class="input-group input-medium date date-picker">
                            <?= Html::activeTextInput($model,'pw_dateUpdated',['class'=>'form-control week']); ?>
                            <span class="input-group-btn">
                                <button class="btn default" type="button">
                                    <i class="fa fa-calendar"></i>
                                </button>
                            </span>
                        </div>
                    </div>
            </div>
        </div>
        <br>
    <div class="form-group">
        <?= Html::submitButton('Cari', ['class' => 'demo-loading-btn btn blue','data-loading-text'=>'Cari...']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
