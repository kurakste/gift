<?php 
use yii\helpers\Url;
use yii\helpers\Html;

$citycpu = $this->params['citycpu'];
$cities = $this->params['cities'];
$curentcity = $this->params['city'];

?>
<style>

    .right-align-p {
    padding-left: 90px;
    }

    #imgForClients {
        border-radius:15px !important;
        box-shadow: 0 0 10px rgba(0,0,0,0.3)!important;
    }

    @media only screen and (min-width: 375px) and (max-width: 667px) {
        .banner_area {
            height: 50%;
            display: none;
        }

        .h2Black {
            color: black;
        }

        .textJustify {
            text-align: justify;
        }

        #textJustify {
            text-align: justify;
        }

        .right-align-p {
            padding-left:12%;
            }
    }
    #first_block {
        margin-top:70px;
        padding-bottom: 60px;
    }

    .text_just {
        width: 90%;
        text-align: justify;
    }
    
</style>
<script>
    var globalPage = 'about';

</script>

<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content text-center">
                <h2>КОНТАКТЫ</h2>
                <div class="page_link">
                    <a href="<?= Url::toRoute(['site/index-city', 'city' => $curentcity->cpu]) ?>">ГЛАВНАЯ</a>
                    <a href="#">КОНТАКТЫ</a>
                </div>
            </div>
        </div>
    </div>
</section>


    <!--================Deal Timer Area =================-->

    <section class="feature_product_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="section-top-border">
                    <h3 class="mb-30 title_color" id='main-header'>ПАРТНЕРАМ</h3>
                    <div class="row mainrow">
                        <div class="col-md-3">
                            <img class="" src="/img/partnership.jpg" alt="" class="img-fluid" id="imgMobile">
                        </div>
                        <div class="col-md-9 mt-sm-20 right-align-p">
                            <p class='text_just'>
                                Мы находим новых клиентов для наших партнеров. Фотографии, видео контент, дизайн,
                                истории и привлечение трафика - это наша работа. Мы упакуем услугу и она станет 
                                стильным подарком. Продажи - это то, что мы любим и умеем. Партнерам мы предлагаем
                                новый канал продаж. Например у вас сейчас есть картинг клуб в котором можно покататься
                                на классных картах. Мы знаем как продать вас людям которые никогда не думали о картингах, 
                                но им нужен необычный подарок. На день рождения, на день нефтяника или как награду для лучшего 
                                отдела в организации. Вас смогут подарить - это совершенно новые для вас клиенты. Их не было 
                                у вас раньше. Они о вас не думали. Если вы при этом сумеете им понравиться - они к вам вернуться 
                                много раз и приведут своих друзей. Через нас или напрямую к вам. 
                                Что нужно нам - скидка. Мы хотим чт бы тавар на нашем сервисе стоил столько же, сколько и у вас на 
                                витрине. Размер скидки мы согласовывае с каждым партнером индивидуально, это сильно зависит от категории
                                продукта. 
                                Хотите попробовать? Оставьте свой контакт - мы свяжемся с вами. Если вы заполните заявку на включение продукта в каталог
                                - все пойдет гораздо быстее. 
                            </p>
                            <a class="white_bg_btn add_to_btn" id="main-header" href="#inputphonefield">Заказать звонок</a>
                            <a class="white_bg_btn add_to_btn" id="main-header" href="#inputphonefield">Заявка на продукт</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Deal Timer Area =================-->

    <!--================Latest Product Area =================-->
    <section class="feature_product_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="section-top-border">
                    <h3 class="mb-30 title_color" id='main-header1'>ПРЕДПРИНИМАТЕЛЯМ</h3>
                    <div class="row">
                        <div class="col-md-9 mt-sm-20 left-align-p">
                            <p class="text_just">
                                Как запустить такой сервис в вашем городе?
                            </p>
                            <p class="text_just">
                                Есть два варианта. Подождать. Мы планируем прийти во все крупные города. Своими силами или через наших партнеров. Если вы предприниматель, любите работать, вам нравится наша идея и вы хотите развивать её в вашем городе - дайте нам знать. Мы свяжемся с вами и обсудим возможные варианты. Оставьте нам ваш номер телефона. Мы позвоним. Нам нужны единомышленники.
                            </p>
                            <a class="white_bg_btn add_to_btn" id='main-header' href="#inputphonefield">Заказать звонок</a>
                        </div>
                        <div class="col-md-3">
                            <img class="imgMobile" src="/img/thoughtfully.jpg" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>

