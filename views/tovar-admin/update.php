<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TovarAdmin */

$this->title = 'Изменить: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<link rel="stylesheet" href="../adminCss.css">
<div class="tovar-admin-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
