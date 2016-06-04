<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReasonPaperworkNotapprovedSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reason Paperwork Notapproveds';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reason-paperwork-notapproved-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Reason Paperwork Notapproved', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'sebab',
            'paperwork_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
