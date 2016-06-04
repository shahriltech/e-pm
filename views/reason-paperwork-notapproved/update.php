<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ReasonPaperworkNotapproved */

$this->title = 'Update Reason Paperwork Notapproved: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Reason Paperwork Notapproveds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="reason-paperwork-notapproved-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
