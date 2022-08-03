<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\user */

$this->title = 'Изменить данные пользователя: '. $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<link rel="stylesheet" href="../adminCss.css">

<div class="user-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
