<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Paperwork;
/* @var $this yii\web\View */
/* @var $model app\models\Paperwork */

?>
<?php                                                    
    foreach ($model as $key => $value) {
        $id = $value['id'];
        $nama_program =  $value['nama_program'];
        $pw_obj = $value['pw_obj'];
        $pw_background = $value['pw_background'];
        $pw_justifikasi = $value['pw_justifikasi'];
        $pw_advantage = $value['pw_advantage'];
        $pw_startdate = $value['pw_startdate'];
        $pw_endDate = $value['pw_endDate'];
        $jangka_masa = $value['jangka_masa'];
        $pw_budget = $value['pw_budget'];
        $pw_submit_status = $value['pw_submit_status'];
        $nama_pencadang = $value['fullname'];
        $norujukan = $value['pw_norujukan'];
        $jawatan = $value['position'];
        $status_nazir = $value['status_by_nazir'];
    }


?>
<?php if (Yii::$app->user->identity->role == 1) { ?>
    <span id="paperworkView" class="<?php echo Yii::$app->controller->id."/".Yii::$app->controller->action->id;?>"></span>
<?php }elseif(Yii::$app->user->identity->role == 3){ ?>
    <span id="paperworkadminView" class="<?php echo Yii::$app->controller->id."/".Yii::$app->controller->action->id;?>"></span>
<?php }elseif(Yii::$app->user->identity->role == 2){?>
    <span id="paperworkajkView" class="<?php echo Yii::$app->controller->id."/".Yii::$app->controller->action->id;?>"></span>
<?php }?>
<?php if(Yii::$app->user->identity->role <= 3){ ?>
<?php if($status_nazir == "Tidak Diluluskan"){ ?>
<div class="note note-danger">
    Harap Maaf. Permohonan kertas kerja tidak luluskan. Berikut adalah sebab kertas kerja tidak diluluskan.<br>
    <?php if (isset($model2->sebab) ) {
        echo $model2->sebab;
    } else{
        "";
    }?>
</div>
<?php } elseif ($status_nazir == "Diluluskan") {?>
    <div class="note note-success">
        Kertas kerja telah diluluskan oleh pihak pengurusan masjid (Nazir). Sila cetak untuk sebagai rujukan.
    </div>
<?php } }?>
<div class="row">

    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption font-green-sharp">
                <i class="icon-speech font-green-sharp"></i>
                    <span class="caption-subject bold uppercase"> Maklumat Terperinci Program </span>"<?=$nama_program?>"
            </div>
            <div class="actions">
                <?php echo Html::a('<i class="icon-printer"></i>', ['paperwork/reportprint','id'=>$id], [
                'class'=>'btn default btn-xs red-stripe', 
                'target'=>'_blank', 
                'data-toggle'=>'tooltip', 
                'title'=>'Print or Save to PDF'
            ]); ?>
                <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;"> </a>
            </div>
        </div>
        
        <div class="panel panel-default">
            <div class = "panel-heading">Maklumat Pencadang</div>
             <div class="panel-body">
                <p>Nama Pencadang : <?php echo $nama_pencadang; ?><br>
                No Rujukan : <?php echo $norujukan;?><br>
                Jawatan :<?php echo $jawatan;?></p>
             </div>
            
        </div>
        <div class="panel panel-default">
            <div class='panel-heading'>Maklumat Program</div>
                <div class="panel-body">
                    <div class="portlet-body">
                        <div class="userpwas-view">
                            <h4>
                                <strong>1.&nbsp;&nbsp;&nbsp;Objektif Program</strong>
                            </h4>
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $pw_obj?></p>
                            <h4>
                                <strong>2.&nbsp;&nbsp;&nbsp;Latar Belakang Program</strong>
                            </h4>
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $pw_background?></p>
                            <h4>
                                <strong>3.&nbsp;&nbsp;&nbsp;Justifikasi Program</strong>
                            </h4>
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $pw_justifikasi?></p>
                            <h4>
                                <strong>4.&nbsp;&nbsp;&nbsp;Kelebihan Program</strong>
                            </h4>
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $pw_advantage?></p> 
                            <h4>
                                <strong>5.&nbsp;&nbsp;&nbsp;Butiran Program</strong>
                            </h4>
                            <ul>
                                <li><b>Nama Program</b></li>
                                <p><?php echo $nama_program ?></p>
                                <li><b>Tarikh Program</b></li>
                                <p><?php echo $pw_startdate?> sehingga <?php echo $pw_endDate; ?></p>
                                <li><b>Waktu Program</b></li>
                                <p><?php echo $jangka_masa?></p>
                                <li><b>Jumlah Peruntukan</b></li>
                                <p>RM<?php echo $pw_budget?></p>
                            </ul>        
                        </div>
                    </div>
                </div>
        </div>
        

    </div>
</div>
