<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Userpass */

$this->title = 'Create Userpass';
$this->params['breadcrumbs'][] = ['label' => 'Userpasses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userpass-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
