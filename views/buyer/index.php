<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BuyerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Buyers';
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile("../buy.css");
?>
<div class="buyer-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            [
                'label' => 'Товар',
                'attribute'=>'tovar.name',
                'value'=> ArrayHelper::getValue($model,'tovar.name'),
            ],
            [
                'label' => 'Пользователь',
                'attribute'=>'user.username',
                'value'=> ArrayHelper::getValue($model,'user.username'),
            ],
            'email',
            [
                'label' => 'Цена',
                'attribute'=>'tovar.price',
                'value'=> ArrayHelper::getValue($model,'tovar.price'),
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <p>
        <?= Html::a('Купить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
