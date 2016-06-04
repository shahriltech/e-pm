<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ReasonPaperworkNotapproved */
/* @var $form yii\widgets\ActiveForm */
$id = $_GET['id'];
?>

<div class="reason-paperwork-notapproved-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sebab')->textArea(['rows' => '8','placeholder'=>'Nyatakan Sebab...']) ?>

    <?= $form->field($model, 'paperwork_id')->hiddenInput(['value'=>$id]) ?>

    <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn default">Tidak</button>
            <!--<input type='submit' class='btn green' value='Kemaskini'> -->
            <?= Html::submitButton($model->isNewRecord ? 'Hantar' : 'Kemaskini', ['class' => $model->isNewRecord ? 'btn green button-submit' : 'btn green button-submit']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
