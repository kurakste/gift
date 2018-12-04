<?php
use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;

AppAsset::register($this);

$this->registerJsFile('/js/ajax.js');
$this->registerJsFile('/js/layout.js');

$cities = $this->params['cities'];


$citycpu = $this->params['citycpu'];
$curentcity = $this->params['city'];

//vd($curentcity);
?>

    <style>
        #logo-img {
            width: 120px;
        }

        .icon-link {
            padding-top: 15px;
        }

        .text-body {
            max-width: 380px !important;
        }

        .my-arrow {
            height: 40px;
        }

    /* This style is needed for fcatlist & scatlist accente selected issue. */
    .accented {
        list-style-type: disc !important;
        font-size: 17px!important;
        text-decoration: underline !important;
    }

    @media only screen and (max-width: 800px) {
        #logo-img {
            width:70px;
        }
    }

    @media only screen and (min-device-width: 375px) and (max-device-width: 667px) {
        .nav navbar-nav menu_nav ml-auto {
            margin-bottom: 10%;
        }

        .footer_title {
            text-align: center;
        }

        .text-body .footerText {
            text-align: justify;
        }

        .btnCentered {
            text-align: center;
        }
        .footerText {
            text-align: justify;
        }
    }

    </style>

    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">

    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="/img/logo.png" type="image/png">

        <?= Html::csrfMetaTags() ?>
            <title>
                <?= Html::encode($this->title) ?>
            </title>
            <?php $this->head() ?>
    </head>

    <body>
        <?php $this->beginBody() ?>
        <!--================Header Menu Area =================-->
        <header class="header_area">
            <div class="top_menu row m0">
                <div class="container">
                    <div class="float-right">
                        <ul class="header_social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-vk"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="main_menu">
                <nav class="navbar navbar-expand-lg navbar-light main_box">
                    <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <a class="navbar-brand logo_h" id="home-link-1" href="<?= Url::toRoute(['site/index']) ?>"><img id="logo-img" src="/img/logo.png" alt=""></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

                        <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                            <ul class="nav navbar-nav menu_nav ml-auto">
                                <li class="nav-item" style="margin-top:18px;">
                                    <select id='citieslist' name='city'>
                                    <?php foreach ($cities as $city): ?>
                                        <option 
                                            <?php if ($curentcity->id == $city->id) echo "selected"; ?>
                                        value ="<?= $city->id ?>"><?= $city->name ?></option>
                                    <?php endforeach ?>
                                </select>
                                </li>
                                <li class="nav-item id=" home-link-2 " <?php if ($this->params['page']==='main') echo "active " ?>"><a class="nav-link" href="<?= Url::toRoute(['site/index-city', 'city'=>$citycpu]) ?>">ГЛАВНАЯ</a></li>
                                <li class="nav-item <?php if ($this->params['page']==='cat') echo " active " ?>"><a class="nav-link" href="<?= Url::toRoute(['/site/category', 'city'=>$citycpu, 'fcats' => '_']) ?>">Подарки</a></li>
                                <li class="nav-item <?php if ($this->params['page']==='how') echo " active " ?>"><a class="nav-link" href="<?= Url::toRoute(['site/how-does-it-work']) ?>">Как это работает</a></li>
                                <li class="nav-item <?php if ($this->params['page']==='act') echo " active " ?>"><a class="nav-link" href="<?= Url::toRoute(['site/activate']) ?>">Сертификат</a></li>
                                <li class="nav-item <?php if ($this->params['page']==='about') echo " active " ?>"><a class="nav-link" href="<?= Url::toRoute(['site/about']) ?>">Контакты</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li class="nav-item"><a href="<?= Url::toRoute(['site/favorite']) ?>" class="cart"><i class="lnr lnr lnr-heart"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!--================Header Menu Area =================-->


        <?= $content ?>


            <!--================ start footer Area  =================-->
            <!--убрать все лишнее -->

            <footer class="footer-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5  col-md-6 col-sm-6">
                            <div class="single-footer-widget">
                                <h6 class="footer_title">О НАС</h6>
                                <p class='text-body' id='about-block'>
                                    Мы - команда увлеченных своим делом парней. Любим программировать, продавать и придумывать новые проекты. Не боимся работы и получаем от нее удовольствие.
                                </p>
                                <p class='text-body'>
                                    Цель этого проекта - стать лучшим ресурсом в RUнете для покупки подарков. Если у вас есть предложения как нам стать лучше - пишите, нам нужна обратная связь:
                                </p>
                                <br>
                                <div class="btnCentered"><a class="white_bg_btn add_to_btn" href="<?= Url::toRoute(['/site/mail']) ?>">НАПИСАТЬ</a></div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="single-footer-widget">
                                <h6 class="footer_title">ОБРАТНЫЙ ЗВОНОК</h6>
                                <p class="footerText">Отправьте нам ваш номер телефона и мы вам перезвоним.</p>
                                <div id="mc_embed_signup ">
                                    <form target="_blank " action="# " method="get " class="subscribe_form relative ">
                                        <div class="input-group d-flex flex-row ">
                                            <input name="EMAIL " placeholder="номер телефона " onfocus="this.placeholder='' " onblur="this.placeholder='Номер телефона' " required=" " type="email ">
                                            <button class="btn sub-btn my-arrow "><span class="lnr lnr-arrow-right "></span></button>
                                        </div>
                                        <div class="mt-10 info "></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 ">
                            <div class="single-footer-widget instafeed ">
                                <h6 class="footer_title ">НАШ ИНСТАГРАМ</h6>
                                <ul class="list instafeed d-flex flex-wrap ">
                                    <li><img src="/img/instagram/Image-01.jpg " alt=" "></li>
                                    <li><img src="/img/instagram/Image-02.jpg " alt=" "></li>
                                    <li><img src="/img/instagram/Image-03.jpg " alt=" "></li>
                                    <li><img src="/img/instagram/Image-04.jpg " alt=" "></li>
                                    <li><img src="/img/instagram/Image-05.jpg " alt=" "></li>
                                    <li><img src="/img/instagram/Image-06.jpg " alt=" "></li>
                                    <li><img src="/img/instagram/Image-07.jpg " alt=" "></li>
                                    <li><img src="/img/instagram/Image-08.jpg " alt=" "></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- row -->
                    <!--================ End footer Area  =================-->
                </div>
            </footer>



            <?php $this->endBody() ?>
    </body>

    </html>
    <?php $this->endPage() ?>
