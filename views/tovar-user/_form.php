<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TovarUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tovar-user-form">

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

<?= $form->field($model, 'photo_tovar')->fileInput(['maxlength' => true]) ?>

<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'brand')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'size')->textInput(['placeholder'=>'XS,S,M,L,XL,XXL,XXL']) ?>

<?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'proizvoditel')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'country_pro')->textInput() ?>

<?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'status')->hiddenInput(['value' => 'отказано','disabled' => true])->label(false) ?>

<div class="form-group">
    <?= Html::submitButton('Выставить на продажу', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>
