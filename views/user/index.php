<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<link rel="stylesheet" href="../adminCss.css">
<div class="user-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            // 'id',
            'username',
            [
                'label' => 'Роль',
                'attribute'=>'role.name',
                'value'=> ArrayHelper::getValue($model,'role.name'),
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <p>
        <?= Html::a('Добавить пользователя', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
