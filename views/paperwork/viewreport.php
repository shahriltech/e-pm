<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Paperwork;
/* @var $this yii\web\View */
/* @var $model app\models\Paperwork */

?>
<span id="viewreport" class="<?php echo Yii::$app->controller->id."/".Yii::$app->controller->action->id;?>"></span>

<?php                                                    
    foreach ($model as $key => $value) {
        $id = $value['id'];
        $nama_program =  $value['nama_program'];
        $pw_obj = $value['pw_obj'];
        $pw_background = $value['pw_background'];
        $pw_justifikasi = $value['pw_justifikasi'];
        $pw_advantage = $value['pw_advantage'];
        $pw_startdate = $value['pw_startdate'];
        $jangka_masa = $value['jangka_masa'];
        $pw_budget = $value['pw_budget'];
        $pw_submit_status = $value['pw_submit_status'];
        $nama_pencadang = $value['fullname'];
        $norujukan = $value['pw_norujukan'];
        $jawatan = $value['position'];

    }


?>

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
                                <li>Nama Program</li>
                                <p><?php echo $nama_program ?></p>
                                <li>Tarikh Program</li>
                                <p><?php echo $pw_startdate?></p>
                                <li>Waktu Program</li>
                                <p><?php echo $jangka_masa?></p>
                                <li>Jumlah Peruntukan</li>
                                <p>RM<?php echo $pw_budget?></p>
                            </ul>        
                        </div>
                    </div>
                </div>
        </div>
        

    </div>
</div>
