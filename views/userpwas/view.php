<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Userpwas;
/* @var $this yii\web\View */
/* @var $model app\models\Userpwas */


?>
<span id="paperworkadminview" class="<?php echo Yii::$app->controller->id."/".Yii::$app->controller->action->id;?>"></span>
<?php                                                    
    foreach ($model as $key => $value) {
        $id = $value['id'];
        $ic_no =  $value['ic_no'];
        $fullname = $value['fullname'];
        $username = $value['username'];
        $role = $value['jenis'];
        $position = $value['position'];
    }
?>
<div class="row">
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption font-green-sharp">
                <i class="icon-speech font-green-sharp"></i>
                    <span class="caption-subject bold uppercase"> Maklumat Terperinci <?=$username?></span>
            </div>
            <div class="actions">
                <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;"> </a>
            </div>
        </div>
        <p>
        <?= Html::a('Kemaskini', ['update', 'id' => $id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Padam', ['delete', 'id' => $id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Adakah anda pasti untuk memadam pengguna ini ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
        <div class="portlet-body">
            <div class="userpwas-view">
                    
                <table class='table table-bordered table-striped table-condensed'  width="100%">
                    <tr>
                        <td>Kad Pengenalan</td>
                        <td><?php echo $ic_no ?></td>
                    </tr>
                    <tr>
                        <td>Nama Penuh</td>
                        <td><?php echo $fullname?></td>
                    </tr>
                    <tr>
                        <td>Nama Samaran</td>
                        <td><?php echo $username?></td>
                    </tr>
                    <tr>
                        <td>Jenis Pengguna</td>
                        <td><?php echo $role?></td>
                    </tr>
                    <tr>
                        <td>Jawatan</td>
                        <td><?php echo $position?></td>
                    </tr>
                </table>
            

            </div>
        </div>
    </div>
</div>