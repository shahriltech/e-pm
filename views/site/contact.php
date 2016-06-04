<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<h3 class="font-green">Lupa Kata Laluan ?</h3>
    <p> Masukkan email anda untuk reset kata laluan. </p>

<?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
<?= $form->errorSummary($model,['class'=>'alert alert-danger','header'=>'']); ?>
    <div class="form-group">
        <?= Html::activeTextInput($model,'email',['class'=>'form-control form-control-solid placeholder-no-fix','placeholder'=>'Email']); ?>
    </div>
    <div class="form-actions">
        <?= Html::a('Kembali', ['site/login'], ['class' => 'btn btn-default']) ?>
        <?= Html::submitButton('Hantar', ['class' => 'btn btn-success uppercase pull-right', 'name' => 'contact-button']) ?>
    </div>
<?php ActiveForm::end(); ?>

