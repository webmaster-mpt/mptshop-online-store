<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .breadcrumb{
        width: 100%;
        background-color: #9370DB;
    }
    a, a:hover {
        color: white;
    }
    .breadcrumb > .active {
        color: white;
    }
    .btn-primary{
        background-color: #000000;
        color: white;
        font-size: 19px;
        font-weight: 300;
        border-color: #000000;
    }
</style>
<div class="site-signup">
    <h1><?= Html::encode("Регистрация") ?></h1>

    <p>Введите данные в форму:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
