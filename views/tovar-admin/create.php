<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TovarAdmin */

$this->title = 'Добавить товар';
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<link rel="stylesheet" href="../adminCss.css">
<div class="tovar-admin-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
