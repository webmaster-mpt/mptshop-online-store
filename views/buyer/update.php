<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\buyer */

$this->title = 'Изменить: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Покупки', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<link rel="stylesheet" href="../adminCss.css">

<div class="buyer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
