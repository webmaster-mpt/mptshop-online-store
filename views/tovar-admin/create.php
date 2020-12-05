<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TovarAdmin */

$this->title = 'Добавить товар';
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
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
<div class="tovar-admin-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
