<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\role */

$this->title = 'Добавить роль';
$this->params['breadcrumbs'][] = ['label' => 'Роли', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
#w1:hover{
    background-color: #000000;
    font-size: 20px;
    text-transform: uppercase;
    font-weight: 700;
    transition: 0.5s ease;
}
.breadcrumb{
    background-color: #000000;
    color:white;
    width:30%;
}

#w0:hover{
    background-color: #9370DB;
    font-size: 16px;
}
.btn-success{
    background-color: #000000;
    color: white;
    border-color: #000000;
}
.btn-success:hover{
    background-color: #000000;
    color: white;
    border-color: #000000;
}
</style>
<div class="role-create">

    <h1><?= Html::encode("Добавить роль") ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
