<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use frontend\models\SignupForm;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,300,600,800,900" rel="stylesheet" type="text/css">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <script type='text/javascript' src='http:///web/api//'></script>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <style>
        #serverload {
            margin: 30px;
            width: 330px;
            height: 136px;
        }
        .preloader{
            position: fixed;
            background-color: #9370DB;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 9999;
        }
        .preloader > div{
            position: relative;
            left: 50%;
            top: 50vh;
            margin: -100px 0 0 -100px;
        }
        .navbar-inverse .navbar-nav > .active > a, .navbar-inverse .navbar-nav > .active > a:hover, .navbar-inverse .navbar-nav > .active > a:focus{
            color:white;
            background: none;
        }
        .navbar-inverse .navbar-nav > li > a{
            color:white;
        }
        .navbar-inverse .navbar-nav > li > a:hover{
            text-decoration: underline;
        }
        .navbar-inverse .btn-link{
            color:white;

        }
        .navbar-inverse .btn-link:hover{
            color:white;

        }
        .navbar-inverse .navbar-brand {
            color:white;

        }
        .navbar-fixed-top {
            top: 0;
            border-width: 0 0 1px;
        }
        #w0{
            top: 0;
            left: 0;
            width: 100%;
            transition: 0.5s ease;
            background-color: #9370DB;

        }
        #w0:hover{
            text-transform: uppercase;
            font-weight: 700;
            transition: 0.5s ease;
        }
        .navbar-brand{
            text-shadow: 0 0 0.6rem #ffe6ff, 0 0 1.5rem #4d0099, -0.2rem 0.1rem 1rem #4d0099, 0.2rem 0.1rem 1rem #4d0099, 0 -0.5rem 2rem #4d0099, 0 0.5rem 3rem #4d0099;
            animation: shine 2s forwards, flicker 3s infinite;
        }
        .navbar-brand:hover{
            font-size: 25px;
            transition: 0.5s ease;
        } 
        body{
            font-family: Montserrat,"Helvetica Neue",Helvetica,Arial,sans-serif;
            font-size: 16px;
            text-transform: uppercase;
            font-weight: 700;
            line-height: 1.5;
            color: #292b2c;
            background-color: #9370DB;
        }
        .navbar-inverse {
            background: rgba(0, 0, 0, 0.4);
            font-weight: 700;
            border: none;
        }
        .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1000;
            display: none;
            float: left;
            min-width: 160px;
            padding: 5px 0;
            margin: 2px 0 0;
            font-size: 14px;
            text-align: left;
            list-style: none;
            background-color: #9370DB;
            color: #fff;
            font-weight: 300;
            background-clip: padding-box;
            border: 1px solid #ccc;
            border: 1px solid rgba(0, 0, 0, 0.15);
            border-radius: 4px;
            -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
        }
         .dropdown-menu > li > a {
            color: white;
        }
        .dropdown-menu > li > a:hover{
            color: white;
            background-color: #9370DB;
            text-decoration: underline;
        } 
        .navbar-inverse .navbar-nav > .open > a, .navbar-inverse .navbar-nav > .open > a:hover, .navbar-inverse .navbar-nav > .open > a:focus{
            color:white;
            background-color: #9370DB;
        }
    </style>
</head>
<body>
<?php $this->beginBody() ?>
<div class="preloader">
    <div>
        <img src="../Infinity-1.5s-200px.svg" class="img">
    </div>
</div>
<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Главная', 'url' => ['/site/index']],
        ['label' => 'Продажа', 'url' => ['/tovar-user/create']],
        ['label' => 'Поддержка', 'url' => ['/helper/create']],
        ['label' => 'Сортировать', 'items' => [
            ['label' => 'По возрастанию', 'url' => ['/site/sort']],
            ['label' => 'По убыванию', 'url' => ['/site/price']],
        ]],
    ];
    if(SignupForm::hasRole(1)){ $menuItems[] = 
        ['label' => 'Админка', 'items' => [
            ['label' => 'Пользователи', 'url' => ['/user']],
            ['label' => 'Роли', 'url' => ['/role']],
            ['label' => 'Товар', 'url' => ['/tovar-admin']],
            ['label' => 'Корзина', 'url' => ['/buyer']],
        ]];
    }        
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Регистрация', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Авторизация', 'url' => ['/site/login']];
    } 
    else{
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Выход в окно (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }  
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
<script>
    $(window).on('load', function(){
        $('.preloader').delay(1000).fadeOut('slow');
    });
</script>