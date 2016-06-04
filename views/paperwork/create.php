<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Userpwas */

$this->title = 'e-PM';
$this->params['breadcrumbs'][] = ['label' => 'Paperworks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption font-green-sharp">
                <i class="icon-speech font-green-sharp"></i>
                    <span class="caption-subject bold uppercase">Borang Kertas Kerja</span>
            </div>
            <div class="actions">
                <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;"> </a>
            </div>
        </div>
        <div class="portlet-body">
            <div class="userpwas-create">
            	<?= $this->render('_form', [
                    'model' => $model,
                ]) ?>

            </div>
        </div>
    </div>
</div>
