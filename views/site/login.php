<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Авторизация';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .breadcrumb{
        width: 17%;
        background-color: #000000;
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
<div class="site-login">
    <h1><?= Html::encode("Авторизация") ?></h1>

    <p>Введите необходимые данные в форму!)</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div class="form-group">
                    <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
