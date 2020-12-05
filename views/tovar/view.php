<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $model frontend\models\tovar */

$this->title = ArrayHelper::getValue($model,'name');
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<style>
.table-bordered {
    border-style: solid;
    border-width: 0 1px 1px 0;
    border-color: #4d0099;
}
.table-bordered > thead > tr > th,.table-bordered > thead > tr > td{
    border-style: solid;
    border-width: 0 1px 1px 0;
    border-color: #4d0099;
}
.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td{
    border-style: solid;
    border-width: 0 1px 1px 0;
    border-color: #4d0099;
}
table{
    border-collapse: collapse;
    box-shadow: 0.7em 0.7em 5px #5300a5;
}

.user-index{
    color:white;
}
.breadcrumb{
    background-color: #000000;
    color:white;
    width:100%;
}
.summary{
    background-color: #9370DB;
    color: #8B0000;
}
td{
    background-color: #6600cc;
    color: white;
}
td a{
    color: white;
}
td a:hover{
    color: white;
}
th{
    background-color: #6600cc;
    color: white;
}
th a{
    color: white;
}
th a:hover{
    color: white;
}
#w0{
    top: 0;
    width: 100%;
    font-size: 16px;
    background-color: #6600cc;
    height:500px;
    /* padding: 20px; */
    display: grid;
    grid-template-columns: repeat(2,1fr);
}
#w0:hover{
    top: 0;
    width: 100%;
    font-size: 16px;
    background-color: #6600cc;
    height:500px;
    display: grid;
    grid-template-columns: repeat(2,1fr);
    padding: 0;
}
#w2{
    font-size: 16px;
    background-color: #6600cc;
}

#w2:hover{
    background-color: #000000;
    font-size: 20px;
    text-transform: uppercase;
    font-weight: 700;
    transition: 0.5s ease;
}
#w1{
    font-size: 15px;
    margin-top: 250px;
}
#w1:hover{
    font-size: 15px;
    text-transform: uppercase;
    font-weight: 700;
}
.modal-header{
    font-size: 17px;
}
.modal-body{
    font-size: 17px;
    text-transform: uppercase;
    font-weight: 700;
    padding: 10px;
}
.control-label{
    margin-left: 60px;
}
#buyer-email{
    background-color: #000000;
    color:white;
    font-size: 19px;
    border-color: #9370DB;
    min-width: 10%;
    max-width: 80%;
    margin-left: 60px;
}
.form-control{
    background-color: #000000;
    color:white;
    border-color: #9370DB;
    width: 100%;
}
.btn-primary{
    background-color: #000000;
    color: white;
    border-color: #000000;
}
.btn-primary:hover{
    background-color: #000000;
    color: white;
    border-color: #000000;
}
.btn-danger{
    background-color: #000000;
    color: white;
    border-color: #000000;
}
.btn-danger:hover{
    background-color: #000000;
    color: white;
    border-color: #000000;
}
.info{
    margin-top: 5px;
}
.tovar{
    background-color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0;
    height:100%;
    width: 100%;
}
.buyer{
    margin-top: 11px;
    margin-left: 10px;
    height:100%;
    width: 100%;
}
.tovar h2{
    margin-top: -10px;
    font-weight: 600;
}
.buyer h2{
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
}
.btn-success{
    margin-left: 60px;
    background-color: #000000;
    color: white;
    border-color: #000000;
}
.btn-success:hover{
    margin-left: 60px;
    background-color: #000000;
    color: white;
    border-color: #000000;
}
</style>

<div class="tovar-views">

    <?php $form = ActiveForm::begin(); ?>
    <!-- <div class="all"> -->
        <div class="tovar">
        <h2>Товар</h2>
        <img src="/uploads/<?= $model->photo_tovar ?>" width="70%" height="70%">
        <div class="info">
            <?
            Modal::begin([
                'size'=>'modal-lg',
                'header' => $model->name,
                'toggleButton' => ['label' => 'Информация о товаре'],
                'footer' => 'Цена: '.$model->price . '$',
            ]);
             
            echo 'Брэнд:'.$model->brand. '<br>';
            echo 'Размер:'.$model->size. '<br>';
            echo 'Цвет:'.$model->color. '<br>';
            echo 'Производитель:'.$model->proizvoditel. '<br>';
            echo 'Страна производства:'.$model->country_pro. '<br>';
             
            Modal::end();
            ?>
        </div>
        </div>
        <div class="buyer">
            <h2>Покупка</h2>
            <?= $form->field($model, 'photo_tovar')->hiddenInput(['value' => $model->photo_tovar])->label(false) ?>
            
            <?= $form->field($model, 'name')->hiddenInput(['value' => $model->name])->label(false) ?>

            <?= $form->field($model, 'brand')->hiddenInput(['value' => $model->brand])->label(false) ?>

            <?= $form->field($model, 'size')->hiddenInput(['value' => $model->size])->label(false) ?>

            <?= $form->field($model, 'color')->hiddenInput(['value' => $model->color])->label(false) ?>
           
            <?= $form->field($model, 'price')->hiddenInput(['value' => $model->price])->label(false) ?>
            
            <?= $form->field($buyer_model, 'id_tovar')->
            hiddenInput(['value' => $model->id])->label(false) ?>

            <?= $form->field($buyer_model, 'email')->textInput() ?>

            <div class="form-group">
                <?= Html::submitButton('Купить за ' 
                . $model->price . '$', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    <!-- </div> -->
    

    <?php ActiveForm::end(); ?>
</div>
