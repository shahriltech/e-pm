<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ReasonPaperworkNotapproved */

$this->title = 'Create Reason Paperwork Notapproved';
$this->params['breadcrumbs'][] = ['label' => 'Reason Paperwork Notapproveds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reason-paperwork-notapproved-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
