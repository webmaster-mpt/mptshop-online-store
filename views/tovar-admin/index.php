<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TovarAdminSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Товары';
$this->params['breadcrumbs'][] = $this->title;
?>
<link rel="stylesheet" href="../adminCss.css">
<div class="tovar-admin-index">


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'name',
            'brand',
            'size:ntext',
            'color:ntext',
            'price:ntext',
            'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
        
    ]); ?>
    
 
    <p>
        <?= Html::a('Добавить товары', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
