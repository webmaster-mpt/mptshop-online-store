<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $model frontend\models\tovar */

$this->title = 'Покупка';
?>
<style>
    .user-index{
        color:white;
    }
    .breadcrumb{
        border-collapse: collapse;
        box-shadow: 0.7em 0.7em 5px #5300a5;
    }
    .summary{
        color: #ffffff;
    }
    #w2{
        background-color: #9370DB;
    }
    /*#buyer-email{*/
    /*    color:white;*/
    /*    font-size: 16px;*/
    /*    background: #2B2B2B;*/
    /*    border-color: #9370DB;*/
    /*    min-width: 10%;*/
    /*    max-width: 100%;*/
    /*}*/
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
    .tovar-views{
        position: relative;
        height: 500px;

        background: #9370DB;
    }
    .tovar{
        position: absolute;
        left: 0px;
        top: 0px;
    }
    .buyer{
        position: absolute;
        width: 68%;
        height: 500px;
        left: 372px;
    }
    .info-buy{
        position: absolute;
        width: 100%;
        height: 100%;
        background: #FFFFFF;
    }
    p{
        font-family: Montserrat;
        font-weight: bold;
        font-size: 16px;
        line-height: 20px;

        color: #000000;
    }
    .outer_box{
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
    }
    #info-buy{
        font-family: Montserrat,"Helvetica Neue",Helvetica,Arial,sans-serif;
        font-style: bold;
        font-weight: bold;
        font-size: 20px;
        line-height: 24px;

        color: #000000;
    }
    .zag-info{
        position: absolute;
        width: 100%;
        height: 100%;
        left: 20%;
        top: 68px;
    }
    .info{
        position: absolute;
        width: 412px;
        height: 170px;
        left: 44px;
        top: 68px;
    }
    .buy{
        position: absolute;
        width: 411px;
        height: 111px;
        left: 20%;
        top: 257px;
    }
    .buy-btn{
        width: 411px;
        height: 36px;
        left: 44px;
        top: 332px;

        background: #2B2B2B;
        border-radius: 9px;
    }
    .myInput{
        color: white;
        background: #2B2B2B;
        border-radius: 9px;
    }
    #valueSpan{
        font-family: 'Montserrat';
        font-style: normal;
        font-weight: 500;
        font-size: 16px;
        line-height: 20px;
        color: #000000;
    }
</style>

    <?php $form = ActiveForm::begin(); ?>
<div class="tovar-views">
        <div class="tovar">
            <img src="/uploads/<?= $model->photo_tovar ?>" width="372" height="500">
        </div>
        <div class="buyer">
            <div class="info-buy">
                <div class="outer_box">
                    <p id="info-buy">Информация/Покупка</p>
                </div>
                <div class="zag-info">
                    <p>Название: <span id="valueSpan"><?= $model->name ?></span></p>
                    <p>Брэнд: <span id="valueSpan"><?= $model->brand ?></span></p>
                    <p>Размер: <span id="valueSpan"><?= $model->size ?></span></p>
                    <p>Цвет: <span id="valueSpan"><?= $model->color ?></span></p>
                    <p>Производитель: <span id="valueSpan"><?= $model->proizvoditel ?></span></p>
                    <p>Страна производства: <span id="valueSpan"><?= $model->country_pro ?></span></p>
                </div>
                <div class="buy">
                    <p>Введите почту:</p>
                    <?= $form->field($buyer_model, 'email')->textInput(['class' => 'form-control myInput'])->label(false) ?>
                    <?= Html::submitButton('Купить за '. $model->price . '₽', ['class' => 'btn btn-success buy-btn']) ?>
                </div>
            </div>
        </div>
</div>
</div>
<?= $form->field($model, 'photo_tovar')->hiddenInput(['value' => $model->photo_tovar])->label(false) ?>

<?= $form->field($model, 'name')->hiddenInput(['value' => $model->name])->label(false) ?>

<?= $form->field($model, 'brand')->hiddenInput(['value' => $model->brand])->label(false) ?>

<?= $form->field($model, 'size')->hiddenInput(['value' => $model->size])->label(false) ?>

<?= $form->field($model, 'color')->hiddenInput(['value' => $model->color])->label(false) ?>

<?= $form->field($model, 'price')->hiddenInput(['value' => $model->price])->label(false) ?>

<?= $form->field($buyer_model, 'id_tovar')->hiddenInput(['value' => $model->id])->label(false) ?>


<?php ActiveForm::end(); ?>
