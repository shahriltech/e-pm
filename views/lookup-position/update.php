<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LookupPosition */

$this->title = 'Update Lookup Position: ' . ' ' . $model->position_id;
$this->params['breadcrumbs'][] = ['label' => 'Lookup Positions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->position_id, 'url' => ['view', 'id' => $model->position_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lookup-position-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
