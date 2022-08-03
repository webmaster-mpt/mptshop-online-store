<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Helper */

$this->title = 'Поддержка';
$this->params['breadcrumbs'][] = $this->title;
?>
<link rel="stylesheet" href="../adminCss.css">

<div class="helper-create">

    <p>Данная вкладка предназначена для связи с администрацией! Задавайте ваши вопросы тут!</p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
