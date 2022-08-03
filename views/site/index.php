<?php

use frontend\models\Tovar;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'Chill$h0p';
?>
<head>
<link rel="stylesheet" href="../card.css">
<style>
h1, h2, h3, h4, h5, h6 {
    font-family: Montserrat,"Helvetica Neue",Helvetica,Arial,sans-serif;
    text-transform: uppercase;
    font-weight: 700;
}
</style>
</head>
<body>
        <?php if(Yii::$app->user->identity->id){ ?>
            <?php if($tovarsMy != null){ ?>
                <div class="col-lg-12 text-center">
                            <h1>Наши футболки</h1>
                            <h2>─────────────</h2>
                    </div>
                <div class="grap">
                <?php foreach ($tovarsMy as $tovarMy) { ?>
                        <div class="card">
                                <div class="card-image"><img src="/uploads/<?= $tovarMy->photo_tovar ?>" alt="" width="100%" height="100%"></div>
                                <div class="card-text">
                                        <span class="date"><?=  $tovarMy->name;?></span>
                                </div>
                                <div class="card-stats">
                                        <div class="stat">
                                                <div class="type">
                                                        <a href="<?= Url::to(['tovar/view','id'=> $tovarMy->id])?>"id="buy">Купить <? echo  $tovarMy->price;?>₽</a>
                                                </div>
                                        </div>
                                </div>
                        </div>
                <?php } ?>
            </div>
            <?php } ?>
            <div class="col-lg-12 text-center">
                    <h1>Другие бренды</h1>
                    <h2>─────────────</h2>
            </div>
            <div class="grap">
            <?php
            foreach ($tovarsAll as $tovarAll)
            {
            ?>
            <div class="card">
                    <div class="card-image"><img src="/uploads/<?=  $tovarAll->photo_tovar;?>" alt="" width="100%" height="100%"></div>
                    <div class="card-text">
                            <span class="date"><?=  $tovarAll->name;?></span>
                    </div>
                    <div class="card-stats">
                            <div class="stat">
                                    <div class="type">
                                            <a href="<?= Url::to(['tovar/view','id'=> $tovarAll->id])?>" id="buy">Купить <?= $tovarAll->price;?>₽</a>
                                    </div>
                            </div>
                    </div>
            </div>
            <?php } ?>
            </div>
        <?php } else{
            Yii::$app->session->setFlash('error', 'Вы не авторизованы. Авторизуйтесь!');
        } ?>
</body>