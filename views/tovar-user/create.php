<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TovarUser */

$this->title = 'Продажа';
$this->params['breadcrumbs'][] = ['label' => 'Продажа'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tovar-user-create">
        
    <?php if(Yii::$app->user->identity->id){ ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <?php
    }
    else {
        Yii::$app->session->setFlash('error', 'Вы не авторизованы. Авторизуйтесь!');
    }
    ?>
</div>
