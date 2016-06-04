<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PaperworkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laporan';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="breadcrumbs">
    <h1>Laporan <span id='boldStuff2'></span></h1>
    <ol class="breadcrumb hidden-xs">
                <li>
                    <div class="input-group">
                        <input type="text" class="form-control input-medium pull-right" id='userInput' placeholder="Cth : Bulanan">
                            <span class="input-group-btn">
                                <input type='button' onclick='changeText2()' class="btn btn-success" value='Tukar Tajuk'/>
                            </span>
                    </div>
                </li>
            </ol>
</div>
<div class="row">
    <div class="portlet light">
        
<?php
$cost = 0;
if (!empty($dataProvider->getModels())) {
 foreach ($dataProvider->getModels() as $key => $val) {
     $cost += $val->pw_budget;
    }
    $totalcost = number_format((float)$cost, 2, '.', '');
}
else{
    $totalcost = 0;
}
?>
        <div class="portlet-body">
                 <?php 
                //echo Yii::$app->formatter->asDate('now', 'php:M, Y'); // output: January 1, 2014 ?>
                <div class='hidden-xs'>
                    <?php echo $this->render('_search', ['model' => $searchModel]);?>
                </div>

            <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    //'filterModel' => $searchModel,
                    'summary'=>'',
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'attribute' => 'No Rujukan',
                            'value' => 'pw_norujukan'
                        ],
                        [
                            'attribute' => 'Nama AJK',
                            'value' => 'nama.fullname'
                        ],
                        [
                            'attribute' => 'Tarikh Bermula',
                            'value' => 'pw_startdate'
                        ],
                        [
                            'attribute' => 'Tarikh Akhir',
                            'value' => 'pw_endDate',
                        ],
                        
                        [
                             'label' => 'Peruntukan (RM)',
                             'attribute' => 'budget',
                             'value' => function ($model, $key, $index, $widget) {
                                return $model->pw_budget;
                             },

                        ],

                        /*[
                            'header' => 'Tindakan',
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
                                    $url = ['paperwork/viewreport','id'=>$model->id];
                                        return $url;
                                    }
                                }
                        ],*/
                    ],
                    'tableOptions' =>['class' => 'table table-striped table-bordered'],
                ]); ?>
               <div class='pull-right'>
                    <p><h4>Jumlah Peruntukan :<strong>RM <?php echo $totalcost; ?></strong></h4></p>
               </div>
               <a class="btn btn-lg blue hidden-print margin-bottom-5" onclick="javascript:window.print();"> Print
                    <i class="fa fa-print"></i>
                </a>


        </div>
    </div>
</div>
<script type="text/javascript">
function changeText2(){
    var userInput = document.getElementById('userInput').value;
    document.getElementById('boldStuff2').innerHTML = userInput;
}
</script>
