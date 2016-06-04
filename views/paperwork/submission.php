<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PaperworkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kertas Kerja';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="paperwork-index">


    <!-- BEGIN BREADCRUMBS -->
    <div class="breadcrumbs">
        <h1>Status Kertas Kerja</h1>
            <ol class="breadcrumb">
                <li>
                    <a href="#">Utama</a>
                </li>
                <li class="active">Status Kertas Kerja</li>
            </ol>
    </div>
<?php if(Yii::$app->session->hasFlash('mesejLulus')):?>
            <div class="note note-success">
                <button type="button" class="close" data-dismiss="alert"></button>
                 <?php echo  Yii::$app->session->getFlash('mesejLulus'); ?>
            </div>
        <?php endif; ?>
<?php if(Yii::$app->user->identity->position_id == 28){ ?>
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'summary'=>'',
        'pager' => [
        'firstPageLabel' => 'Pertama',
        'lastPageLabel' => 'Terakhir'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pw_norujukan',
            'nama_program',
            [
                'attribute' => 'Setiausaha',
                'format' => 'raw',
                
                'value' => function ($model, $key, $index) { 
                    if($model->status_by_su === 0){
                        return Html::a('<span class="btn blue-soft">'.$model->statusbysetia->status.'</span>');
                    }
                    if($model->status_by_su ===1){
                        return Html::a('<span class="btn green-meadow">'.$model->statusbysetia->status.'</span>');
                    }
                    if($model->status_by_su ===2){
                        return Html::a('<span class="btn btn-danger">'.$model->statusbysetia->status.'</span>');
                    }
                },
            ],

            [
                'header' => 'Tindakan',
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{lihat}   {kemaskini}   {buang}',
                'buttons' => [
                'lihat' => function ($url, $model) {
                    return Html::a('<span class="btn default btn-xs red-stripe">Lihat</span>', 
                        $url,['title'=> Yii::t('app','Lihat')]);

                },
                    ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'lihat') {
                        $url = ['paperwork/approval','id'=>$model->id];
                            return $url;
                        }
                    }
            ],
        ],
    ]); }elseif(Yii::$app->user->identity->position_id == 27) {?>
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'summary'=>'',
        'pager' => [
        'firstPageLabel' => 'Pertama',
        'lastPageLabel' => 'Terakhir'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pw_norujukan',
            'nama_program',
            [
                'attribute' => 'Setiausaha',
                'format' => 'raw',
                
                'value' => function ($model, $key, $index) { 
                    if($model->status_by_su === 0){
                        return Html::a('<span class="btn blue-soft">'.$model->statusbysetia->status.'</span>');
                    }
                    if($model->status_by_su ===1){
                        return Html::a('<span class="btn green-meadow">'.$model->statusbysetia->status.'</span>');
                    }
                    if($model->status_by_su ===2){
                        return Html::a('<span class="btn btn-danger">'.$model->statusbysetia->status.'</span>');
                    }
                },
            ],
            [
                'attribute' => 'Bendahari',
                'format' => 'raw',
                
                'value' => function ($model, $key, $index) { 
                    if($model->status_by_bendahari === 0){
                        return Html::a('<span class="btn blue-soft">'.$model->statusbybendahari->status.'</span>');
                    }
                    if($model->status_by_bendahari ===1){
                        return Html::a('<span class="btn green-meadow">'.$model->statusbybendahari->status.'</span>');
                    }
                    if($model->status_by_su ===2){
                        return Html::a('<span class="btn green-meadow">'.$model->statusbybendahari->status.'</span>');
                    }
                },
            ],

            [
                'header' => 'Tindakan',
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{lihat}   {kemaskini}   {buang}',
                'buttons' => [
                'lihat' => function ($url, $model) {
                    return Html::a('<span class="btn default btn-xs red-stripe">Lihat</span>', 
                        $url,['title'=> Yii::t('app','Lihat')]);

                },
                    ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'lihat') {
                        $url = ['paperwork/approval','id'=>$model->id];
                            return $url;
                        }
                    }
            ],
        ],
    ]); }elseif (Yii::$app->user->identity->position_id == 26) { ?>
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'summary'=>'',
        'pager' => [
        'firstPageLabel' => 'Pertama',
        'lastPageLabel' => 'Terakhir'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pw_norujukan',
            'nama_program',
            [
                'attribute' => 'Setiausaha',
                'format' => 'raw',
                
                'value' => function ($model, $key, $index) { 
                    if($model->status_by_su === 0){
                        return Html::a('<span class="btn blue-soft">'.$model->statusbysetia->status.'</span>');
                    }
                    if($model->status_by_su ===1){
                        return Html::a('<span class="btn green-meadow">'.$model->statusbysetia->status.'</span>');
                    }
                    if($model->status_by_su ===2){
                        return Html::a('<span class="btn btn-danger">'.$model->statusbysetia->status.'</span>');
                    }
                },
            ],
            [
                'attribute' => 'Bendahari',
                'format' => 'raw',
                
                'value' => function ($model, $key, $index) { 
                    if($model->status_by_bendahari === 0){
                        return Html::a('<span class="btn blue-soft">'.$model->statusbybendahari->status.'</span>');
                    }
                    if($model->status_by_bendahari ===1){
                        return Html::a('<span class="btn green-meadow">'.$model->statusbybendahari->status.'</span>');
                    }
                    if($model->status_by_bendahari ===2){
                        return Html::a('<span class="btn btn-danger">'.$model->statusbybendahari->status.'</span>');
                    }
                },
            ],
            [
                'attribute' => 'Timbalan Nazir',
                'format' => 'raw',
                
                'value' => function ($model, $key, $index) { 
                    if($model->status_by_timbalan === 0){
                        return Html::a('<span class="btn blue-soft">'.$model->statusbytimbalan->status.'</span>');
                    }
                    if($model->status_by_timbalan ===1){
                        return Html::a('<span class="btn green-meadow">'.$model->statusbytimbalan->status.'</span>');
                    }
                    if($model->status_by_timbalan ===2){
                        return Html::a('<span class="btn btn-danger">'.$model->statusbytimbalan->status.'</span>');
                    }
                },
            ],

            [
                'header' => 'Tindakan',
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{lihat}   {kemaskini}   {buang}',
                'buttons' => [
                'lihat' => function ($url, $model) {
                    return Html::a('<span class="btn default btn-xs red-stripe">Lihat</span>', 
                        $url,['title'=> Yii::t('app','Lihat')]);

                },
                    ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'lihat') {
                        $url = ['paperwork/approval','id'=>$model->id];
                            return $url;
                        }
                    }
            ],
        ],
    ]); }elseif (Yii::$app->user->identity->position_id == 25) {?>
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'summary'=>'',
        'pager' => [
        'firstPageLabel' => 'Pertama',
        'lastPageLabel' => 'Terakhir'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pw_norujukan',
            'nama_program',
            [
                'attribute' => 'Setiausaha',
                'format' => 'raw',
                
                'value' => function ($model, $key, $index) { 
                    if($model->status_by_su === 0){
                        return Html::a('<span class="btn blue-soft">'.$model->statusbysetia->status.'</span>');
                    }
                    if($model->status_by_su ===1){
                        return Html::a('<span class="btn green-meadow">'.$model->statusbysetia->status.'</span>');
                    }
                    if($model->status_by_su ===2){
                        return Html::a('<span class="btn btn-danger">'.$model->statusbysetia->status.'</span>');
                    }
                },
            ],
            [
                'attribute' => 'Bendahari',
                'format' => 'raw',
                
                'value' => function ($model, $key, $index) { 
                    if($model->status_by_bendahari === 0){
                        return Html::a('<span class="btn blue-soft">'.$model->statusbybendahari->status.'</span>');
                    }
                    if($model->status_by_bendahari ===1){
                        return Html::a('<span class="btn green-meadow">'.$model->statusbybendahari->status.'</span>');
                    }
                    if($model->status_by_bendahari ===2){
                        return Html::a('<span class="btn btn-danger">'.$model->statusbybendahari->status.'</span>');
                    }
                },
            ],
            [
                'attribute' => 'Timbalan Nazir',
                'format' => 'raw',
                
                'value' => function ($model, $key, $index) { 
                    if($model->status_by_timbalan === 0){
                        return Html::a('<span class="btn blue-soft">'.$model->statusbytimbalan->status.'</span>');
                    }
                    if($model->status_by_timbalan ===1){
                        return Html::a('<span class="btn green-meadow">'.$model->statusbytimbalan->status.'</span>');
                    }
                    if($model->status_by_timbalan ===2){
                        return Html::a('<span class="btn btn-danger">'.$model->statusbytimbalan->status.'</span>');
                    }
                },
            ],
            [
                'attribute' => 'Nazir',
                'format' => 'raw',
                
                'value' => function ($model, $key, $index) { 
                    if($model->status_by_nazir === 0){
                        return Html::a('<span class="btn blue-soft">'.$model->statusbynazir->status.'</span>');
                    }
                    if($model->status_by_nazir ===1){
                        return Html::a('<span class="btn green-meadow">'.$model->statusbynazir->status.'</span>');
                    }
                    if($model->status_by_nazir ===2){
                        return Html::a('<span class="btn btn-danger">'.$model->statusbynazir->status.'</span>');
                    }
                },
            ],

            [
                'header' => 'Tindakan',
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{lihat}   {kemaskini}   {buang}',
                'buttons' => [
                'lihat' => function ($url, $model) {
                    return Html::a('<span class="btn default btn-xs red-stripe">Lihat</span>', 
                        $url,['title'=> Yii::t('app','Lihat')]);

                },
                    ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'lihat') {
                        $url = ['paperwork/approval','id'=>$model->id];
                            return $url;
                        }
                    }
            ],
        ],
    ]); 
    }?>
</div>
