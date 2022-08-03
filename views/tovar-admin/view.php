<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\TovarAdmin */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<link rel="stylesheet" href="../adminCss.css">
<div class="tovar-admin-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'photo_tovar:ntext',
            'name',
            'brand',
            'size:ntext',
            'color:ntext',
            'proizvoditel',
            'country_pro',
            'price',
            'status',
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
