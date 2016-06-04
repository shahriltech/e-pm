<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\ImsRole */
/* @var $form yii\widgets\ActiveForm */

?>
<div class="modal-footer">
    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Tutup</button>
        <?= Html::a('Lulus', ['paperwork/lulus','id'=>$model->id], ['class' => 'btn green-meadow']) ?>
</div>
