<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\People */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Peoples', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="people-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->people_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->people_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'people_id',
            'name',
            'ic_no',
            'address',
            'postcode',
            'dob',
            'gender',
            'race',
            'name_nick',
            'ic_no_old',
            'current_address',
            'state_id',
            'district_id',
            'sub_base_id',
            'cluster_id',
            'kampung_id',
            'birth_place',
            'religion',
            'citizen',
            'marital_status',
            'no_of_children',
            'profession_status',
            'profession',
            'job_position',
            'job_else',
            'income',
            'spending',
            'mobile_no',
            'home_no',
            'email:email',
            'penghulu',
            'local_champion',
            'volunteer',
            'micro_worker',
            'image',
            'enter_date',
            'enter_by',
            'data_status',
            'verified_date',
            'verified_by',
            'flag',
            'mukim',
            'tarikh_soal_selidik',
            'nota',
            'ruang_cadangan',
            'oku',
            'tanggungan_oku',
            'mukim_id',
            'bahagian_id',
        ],
    ]) ?>

</div>
