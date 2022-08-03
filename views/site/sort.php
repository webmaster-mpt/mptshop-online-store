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
header .container {
    padding-top: 200px;
    padding-bottom: 100px;
}
.container {
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
    width: 1170px;
}
.row {
    margin-right: -15px;
    margin-left: -15px;
}
center {
    display: block;
    text-align: -webkit-center;
}
.sign {
    position: absolute;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 50%;
    height: 20%;
    transform: translate(-50%, -50%);
    letter-spacing: 2;
    left: 50%;
    top: 30%;
    font-family: "Archivo Black", "Archivo", sans-serif;
    text-transform: uppercase;
    font-size: 6em;
    font-weight: 1000;
    color: #ffe6ff;
    text-shadow: 0 0 0.6rem #ffe6ff, 0 0 1.5rem #4d0099, -0.2rem 0.1rem 1rem #4d0099, 0.2rem 0.1rem 1rem #4d0099, 0 -0.5rem 2rem #4d0099, 0 0.5rem 3rem #4d0099;
    animation: shine 2s forwards, flicker 3s infinite;
}
.fast-flicker {
    animation: shine 2s forwards, blink 10s 1s infinite;
}
.flicker {
    animation: shine 2s forwards, blink 3s 2s infinite;
}
#sotrprice{
        color:#000000;
        margin: 25px;
        margin-top: 20px;
}
</style>
</head>
<body>
        <?php if(Yii::$app->user->identity->id){?>
        <div class="col-lg-12 text-center">
                <h1>Цены по возрастанию</h1>
                <h2>─────────────</h2>
        </div> 
        <div class="grap">
        <?php
        foreach ($tovarsAll as $tovarAll) 
        {
        ?>
        <div class="card">
                
                <div class="card-image"><img src="/uploads/<? echo  
                $tovarAll->photo_tovar;?>" alt="" width="100%" height="100%"></div>
                <div class="card-text">
                        <span class="date"><? echo  $tovarAll->name;?></span>
                </div>
                <div class="card-stats">
                        <div class="stat">
                                <div class="type">
                                        <a href="<?= Url::to(['tovar/view','id'=> $tovarAll->id])?>"id="buy">Купить <? echo  $tovarAll->price;?>₽</a>
                                </div>
                        </div>
                </div>
        </div>
        <?php } ?>
        </div>
        <?php 
        }
        else{
            Yii::$app->session->setFlash('error', 'Вы не авторизованы. Авторизуйтесь!');
        } ?>
</body>