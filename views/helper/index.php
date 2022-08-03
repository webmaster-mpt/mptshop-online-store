<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\HelperSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Helpers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="helper-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Helper', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'question:ntext',
            'answer:ntext',
//            'user_id',
            [
                'label' => 'Пользователь',
                'attribute'=>'user.username',
                'value'=> ArrayHelper::getValue($model,'user.username'),
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
