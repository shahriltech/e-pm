<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\People */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="people-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ic_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'postcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dob')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'race')->textInput() ?>

    <?= $form->field($model, 'name_nick')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ic_no_old')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'current_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'state_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'district_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sub_base_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cluster_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kampung_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birth_place')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'religion')->textInput() ?>

    <?= $form->field($model, 'citizen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'marital_status')->textInput() ?>

    <?= $form->field($model, 'no_of_children')->textInput() ?>

    <?= $form->field($model, 'profession_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'profession')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'job_position')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'job_else')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'income')->textInput() ?>

    <?= $form->field($model, 'spending')->textInput() ?>

    <?= $form->field($model, 'mobile_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'home_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'penghulu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'local_champion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'volunteer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'micro_worker')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->textInput() ?>

    <?= $form->field($model, 'enter_date')->textInput() ?>

    <?= $form->field($model, 'enter_by')->textInput() ?>

    <?= $form->field($model, 'data_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'verified_date')->textInput() ?>

    <?= $form->field($model, 'verified_by')->textInput() ?>

    <?= $form->field($model, 'flag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mukim')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tarikh_soal_selidik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nota')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ruang_cadangan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'oku')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggungan_oku')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mukim_id')->textInput() ?>

    <?= $form->field($model, 'bahagian_id')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
