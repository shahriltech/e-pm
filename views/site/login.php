<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'login-form'],
    ]); ?>
    
    
<?php if(Yii::$app->session->hasFlash('contactFormSubmitted')):?>
    <div class="note note-success">
        <button type="button" class="close" data-dismiss="alert"></button>
            <?php echo  Yii::$app->session->getFlash('contactFormSubmitted'); ?>
    </div>
<?php endif; ?>
    <div class="form-group">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label class="control-label visible-ie8 visible-ie9">Nama Samaran</label>
        <?= Html::activeTextInput($model,'username',['class'=>'form-control form-control-solid placeholder-no-fix','placeholder'=>'Nama Samaran']); ?>
    </div>
    <div class="form-group">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label class="control-label visible-ie8 visible-ie9">Password</label>
        <?= Html::activePasswordInput($model,'password',['class'=>'form-control form-control-solid placeholder-no-fix','placeholder'=>'Kata Laluan']); ?>
    </div>
    <?= $form->errorSummary($model,['class'=>'alert alert-danger','header'=>'']); ?>
    <div class="form-actions">
        <?= Html::submitButton('Log Masuk', ['class' => 'btn green-meadow btn-block uppercase', 'name' => 'Login']) ?>
                <a href="http://localhost/e-pm/web/index.php?r=site/contact"  class="forget-password">Lupa Kata Laluan?</a>
    </div>


    <?php ActiveForm::end(); ?>
    

    