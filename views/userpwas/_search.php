<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PeopleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
 
$this->registerJs(
   '$("document").ready(function(){ 
        $("#new_country").on("pjax:end", function() {
            $.pjax.reload({container:"#countries"});  //Reload GridView
        });
    });'
);
?>
<div class="people-search">
    <?php yii\widgets\Pjax::begin(['id' => 'new_country']) ?>

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => ["data-pjax"=>true],
    ]); ?>

    <?php  echo $form->field($model, 'username') ?>

    <?php echo $form->field($model, 'ic_no') ?>

    <div class="form-group">
        <?= Html::submitButton('Cari', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>
<?php yii\widgets\Pjax::end() ?>
</div>
