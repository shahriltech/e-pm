<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LookupPosition */

$this->title = 'Create Lookup Position';
$this->params['breadcrumbs'][] = ['label' => 'Lookup Positions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lookup-position-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
