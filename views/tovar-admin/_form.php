<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TovarAdmin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tovar-admin-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brand')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'size')->textInput(['placeholder'=>'XS,S,M,L,XL,XXL,XXL']) ?>

    <?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'proizvoditel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country_pro')->textInput() ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
