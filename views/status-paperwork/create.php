<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\StatusPaperwork */

$this->title = 'Create Status Paperwork';
$this->params['breadcrumbs'][] = ['label' => 'Status Paperworks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="status-paperwork-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
