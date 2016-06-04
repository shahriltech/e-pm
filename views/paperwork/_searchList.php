<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

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
        'action' => ['list'],
        'method' => 'get',
        'options' => ["data-pjax"=>true],
    ]); ?>
        <div class="row">
            <div class="portlet-body">
                    <div class="col-md-6">
                        <div class="input-group ">
                            <?= Html::activeTextInput($model,'globalSearch',['class'=>'form-control','placeholder'=>'Carian....']); ?>
                            <span class="input-group-btn">
                                <button class="btn default" type="button">
                                    <i class="fa fa-search"></i>
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
