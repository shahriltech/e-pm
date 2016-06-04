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
        <h1>Senarai Kertas Kerja</h1>
            <ol class="breadcrumb">
                <li>
                    <a href="#">Utama</a>
                </li>
                <li class="active">Kertas Kerja</li>
            </ol>
    </div>
    <!-- END BREADCRUMBS -->
    <?php echo $this->render('_searchList', ['model' => $searchModel]);?>
<?php if(Yii::$app->session->hasFlash('ralat')):?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert"></button>
                <?php echo  Yii::$app->session->getFlash('ralat'); ?>
        </div>
<?php endif; ?>
<?php if(Yii::$app->session->hasFlash('addUser')):?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert"></button>
                <?php echo  Yii::$app->session->getFlash('addUser'); ?>
        </div>
<?php endif; ?>
<?php if(Yii::$app->user->identity->role == 3){ ?>
<?= GridView::widget([ 
    
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'pager' => [
        'firstPageLabel' => 'Pertama',
        'lastPageLabel' => 'Terakhir'],
        'summary'=>'',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'pw_norujukan',
            'nama_program',
            'pw_obj',
            [
                'attribute' => 'Status',
                'format' => 'raw',
                
                'value' => function ($model, $key, $index) { 
                    if($model->status_by_nazir === 0){
                        return Html::a('<span class="btn blue">Belum Diluluskan</span>');
                    }
                    if($model->status_by_nazir === 1){
                        return Html::a('<span class="btn green-meadow">Diluluskan</span>');
                    }
                    if($model->status_by_nazir === 2){
                        return Html::a('<span class="btn btn-danger">Tidak Lulus</span>');
                    }
                },
            ],
            [
                'header' => 'Tindakan',
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{lihat} {kemaskini} {buang}',
                'buttons' => [
                    'lihat' => function ($url, $model) {
                        return Html::a('<span class="btn default btn-xs red-stripe">Lihat</span>', 
                            $url,['title'=> Yii::t('app','Lihat')]);
                        },
                    'kemaskini' => function ($url, $model) {
                        return Html::a('<span class="btn default btn-xs red-stripe">Kemaskini</span>', $url, [
                            'title' => Yii::t('app', 'Kemaskini'),
                        ]);
                    },

                    'buang' => function ($url, $model) {
                        return Html::a('<span class="btn default btn-xs red-stripe">Hapus</span>', $url, [
                            'title' => Yii::t('app', 'Buang'),'data-confirm'=>"Adakah anda pasti mahu memadam item ini ?",'data-method' => 'post',
                        ]);
                    },
                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'lihat') {
                        $url = ['paperwork/view','id'=>$model->id];
                            return $url;
                        }
                    if ($action === 'kemaskini') {
                        $url = ['paperwork/update','id'=>$model->id];
                            return $url;
                        }
                    if ($action === 'buang') {
                        $url = ['paperwork/delete','id'=>$model->id];
                            return $url;
                        }
                    }
            ],

           // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php } else{ ?>
<?= GridView::widget([ 
    
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'pager' => [
        'firstPageLabel' => 'Pertama',
        'lastPageLabel' => 'Terakhir'],
        'summary'=>'',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'pw_norujukan',
            'nama_program',
            'pw_obj',
            [
                'attribute' => 'Status',
                'format' => 'raw',
                
                'value' => function ($model, $key, $index) { 
                    if($model->status_by_nazir === 0){
                        return Html::a('<span class="btn blue">Belum Diluluskan</span>');
                    }
                    if($model->status_by_nazir === 1){
                        return Html::a('<span class="btn green-meadow">Diluluskan</span>');
                    }
                    if($model->status_by_nazir === 2){
                        return Html::a('<span class="btn btn-danger">Tidak Lulus</span>');
                    }
                },
            ],
            [
                'header' => 'Tindakadn',
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{lihat}',
                'buttons' => [
                'lihat' => function ($url, $model) {
                    return Html::a('<span class="btn default btn-xs red-stripe">Lihat</span>', 
                        $url,['title'=> Yii::t('app','Lihat')]);
                    },
                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'lihat') {
                        $url = ['paperwork/view','id'=>$model->id];
                            return $url;
                        }
                    }
            ],

           // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php }?>
</div>
