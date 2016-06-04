<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<!-- BEGIN FORGOT PASSWORD FORM -->
<form  action="index.html" method="post">
    <h3 class="font-green">Lupa Kata Laluan ?</h3>
        <p> Masukkan email anda untuk reset kata laluan. </p>
        <div class="form-group">
            <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> 
        </div>
        <div class="form-actions">
            <button type="button" id="back-btn" class="btn btn-default">Back</button>
            <button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
        </div>
</form>
            <!-- END FORGOT PASSWORD FORM -->