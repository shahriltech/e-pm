<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LookupRole */

$this->title = 'Create Lookup Role';
$this->params['breadcrumbs'][] = ['label' => 'Lookup Roles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lookup-role-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
