<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TovarUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Продажа';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
.pagination{
    
}
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
.action-column{
    background-color: #6600cc;
}

table{
    width: 100%;
    border-collapse: collapse;
    box-shadow: 0.7em 0.7em 5px #5300a5;
}
#w2{
    font-size: 16px;
}
#w2:hover{
    font-size: 20px;
    transition: 0.5s ease;
}
.user-index{
    color:white;
}
.breadcrumb{
    background-color: #000000;
    color:white;
    width:24%;
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
    padding: 0px;
    font-size: 16px;
    background-color: #6600cc;
}
#w1{
    font-size: 16px;
    background-color: #6600cc;
}
#w1:hover{
    padding: 0px;
    font-size: 20px;
    background-color: #000000;
    text-transform: uppercase;
    font-weight: 700;
    transition: 0.5s ease;
    padding: 9px;
}
.form-control{
    background-color: #6600cc;
    color:white;
    border-color: #000000;
    width: 150px;
}
.form-control:hover{
    border-color: #000000;
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
<div class="tovar-user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'photo_tovar:ntext',
            'name',
            'brand',
            'size:ntext',
            'color:ntext',
            //'proizvoditel',
            //'country_pro',
            'price',
            'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
