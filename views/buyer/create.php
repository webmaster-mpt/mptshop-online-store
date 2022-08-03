<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\buyer */

$this->title = 'Купить';
$this->params['breadcrumbs'][] = ['label' => 'Покупки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<link rel="stylesheet" href="../adminCss.css">
<div class="buyer-create">
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
