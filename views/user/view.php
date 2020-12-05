<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\user */

$this->title = ArrayHelper::getValue($model,'username');;
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
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
#w1:hover{
    background-color: #000000;
    font-size: 20px;
    text-transform: uppercase;
    font-weight: 700;
    transition: 0.5s ease;
}
.user-index{
    color:white;
}
.breadcrumb{
    background-color: #000000;
    color:white;
    width:22%;
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
    font-size: 16px;
    background-color: #6600cc;
}
#w0:hover{
    font-size: 16px;
    background-color: #6600cc;
}
.form-control{
    background-color: #000000;
    color:white;
    border-color: #9370DB;
    width: 110px;
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
</style>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'username',
            'email:email',
            [
                'attribute'=>'role.role',
                'value'=> ArrayHelper::getValue($model,'role.role'),
            ],
            'status',
            // 'auth_key',
            // 'password_hash',
            // 'password_reset_token',
            // 'created_at',
            // 'updated_at',
            // 'verification_token',
        ],
    ]) ?>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
