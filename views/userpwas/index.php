<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UserpwasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pengurusan Pengguna';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userpwas-index">

    <!-- BEGIN BREADCRUMBS -->
    <div class="breadcrumbs">
        <h1>Pengurusan Pengguna</h1>
            <ol class="breadcrumb">
                <li>
                    <a href="#">Utama</a>
                </li>
                <li class="active">Pengurusan Pengguna</li>
            </ol>
    </div>
    <?php if(Yii::$app->session->hasFlash('addUser')):?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert"></button>
                 <?php echo  Yii::$app->session->getFlash('addUser'); ?>
            </div>
        <?php endif; ?>
    <!-- END BREADCRUMBS -->
    <p>
        <?= Html::a('Tambah Pengguna', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(['id' => 'countries']); ?>  <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'summary'=>'',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'ic_no',
            'fullname',
            'username',
            [
                'header' => 'Tindakan',
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{lihat}   {kemaskini}   {buang}',
                'buttons' => [
                'lihat' => function ($url, $model) {
                    return Html::a('<span class="btn default btn-xs red-stripe" id="modalButton">Lihat</span>', 
                        $url,['title'=> Yii::t('app','Lihat')]);

                },
                'kemaskini' => function ($url, $model) {
                    return Html::a('<span class="btn default btn-xs red-stripe">Kemaskini</span>', $url, [
                        'title' => Yii::t('app', 'Kemaskini'),
                    ]);
                },

                'buang' => function ($url, $model) {
                    return Html::a('<span class="btn default btn-xs red-stripe">Hapus</span>', $url, [
                        'title' => Yii::t('app', 'Buang'),'data-confirm'=>"Adakah anda pasti untuk memadam pengguna ini ?",'data-method' => 'post',
                    ]);
                        },
                    ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'lihat') {
                        $url = ['userpwas/view','id'=>$model->id];
                            return $url;
                        }
                    if ($action === 'kemaskini') {
                        $url = ['userpwas/update','id'=>$model->id];
                            return $url;
                        }
                    if ($action === 'buang') {
                        $url = ['userpwas/delete','id'=>$model->id];
                            return $url;
                        }
                    }
            ],
            // 'password',
            // 'position_id',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
