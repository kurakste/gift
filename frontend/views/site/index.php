<?php
use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;

?>

<style>
    .main-page-image {
        border-radius:15px;
        box-shadow: 0 0 10px rgba(0,0,0,0.3);
    }

    .choose-link  {
        border-radius:15px;
        padding: 10px;
        background-color: rgba(0, 0, 0, 0.4);
    }
    .hot_p_item {
        position: relative !important;
        
    }
    .myproducttext {
        border-radius: 0px 0px 15px 15px;
        padding-right: 5%;
        background-color: rgba(255, 255, 255, 0.7);
        width: 100%;
        height: 15% !important;
        position: absolute !important;
        top: 86% !important;
        /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#ffffff+0,ffffff+49,ffffff+49,ffffff+64&0+0,1+68 */
        background: -moz-linear-gradient(left, rgba(255,255,255,0) 0%, rgba(255,255,255,0.72) 49%, rgba(255,255,255,0.94) 64%, rgba(255,255,255,1) 68%); /* FF3.6-15 */
        background: -webkit-linear-gradient(left, rgba(255,255,255,0) 0%,rgba(255,255,255,0.72) 49%,rgba(255,255,255,0.94) 64%,rgba(255,255,255,1) 68%); /* Chrome10-25,Safari5.1-6 */
        background: linear-gradient(to right, rgba(255,255,255,0) 0%,rgba(255,255,255,0.72) 49%,rgba(255,255,255,0.94) 64%,rgba(255,255,255,1) 68%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00ffffff', endColorstr='#ffffff',GradientType=1 ); /* IE6-9 */
    }
    
    .myproducttext h4 { 
        margin-top: 6px !important; 
    }
    
    .catname { text-transform: uppercase;
        text-align: right;
        color: rgba(50, 50, 50, 0.7)!important;
    }
    
    .cat-image:hover {
        cursor: pointer;
    }
</style>

<section class="home_banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content row">
                <div class="col-lg-5">
                    <!--  сюда писать описание услуги и краткий комент как работает по кнопке переход на видео презу -->
                    <h3 class="mb-30 title_color">Подарки для тех, кто вам дорог.</h3>
                    <p>Мы поможем поздравить дорогих вам людей. Теплые эмоции и необычные подарки. Мы работаем что бы помочь Вам быть ближе.</p>
                    <!--<a class="white_bg_btn" href="#">Выбрать подарок</a>-->
                    <a class="white_bg_btn" href="<?= Url::toRoute(['site/category']) ?>">Выбрать подарок</a>

                </div>
                <div class="col-lg-7">
                    <div class="halemet_img">
                        <!--шлем заменить на рисунок образ подарка 
                        <img src="img/banner/helmat.png" alt=""> -->
                        <img class='main-page-image' src="/img/cover/main_cover_1200.jpeg" alt="" width="100%">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--================Feature Product Area =================-->
<section class="feature_product_area">
    <div class="main_box">
        <div class="container">
            <div class="row hot_product_inner">
                <?php for ($i =0; $i<=3; $i++):  ?>
                <div class="col-lg-6">
                    <div class="hot_p_item" style='margin-top:30px;'>
                        <img class="img-fluid main-page-image cat-image" data-catcpu= "<?= $fcats[$i]->cpu ?>" src="<?= $fcats[$i]->image ?> " alt="">
                        <div class="product_text myproducttext">
                            <h4 class="catname">
                                <?= $fcats[$i]->name ?>
                            </h4>
<!--                            <a class='choose-link' href="/cats/<?= $fcats[$i]->cpu ?>">Перейти к выбору</a> -->
                        </div>
                    </div>
                </div>
                <?php endfor ?>
            </div>
            <div class="feature_product_inner">
                <div class="main_title">
                    <h2>Лучшие подарки в наших коллекциях</h2>
                    <p>У нас вы найдете способ поздравить своих близких, знакомых, родных, коллег.</p><br>
                    <a class="main_btn" href="<?= Url::toRoute(['site/category']) ?>">Подобрать подарок.</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Feature Product Area =================-->

<!--================Deal Timer Area =================-->
<section class="timer_area">
    <div class="container">
        <div class="main_title">
            <h2>Для вдохновения:</h2>
            <p id='quote-container'>
                Идеальный подарок мужчине, у которого все есть, – женщина, которая знает, что со всем этим делать. (Неизвестный автор)
            </p>
            <a class="main_btn" id='btnQuote' href="#">Не помогло?</a>
        </div>
    </div>
</section>
<!--================End Deal Timer Area =================-->

<!--================Latest Product Area =================-->
<section class="feature_product_area latest_product_area">
    <div class="main_box">
        <div class="container">
            <div class="feature_product_inner">
                <div class="main_title">
                    <h2>Топ подарков за месяц</h2>
                    <p>Мы позволили сделать вам большой выбор</p>
                </div>
                <div class="latest_product_inner row">
                    <?php 
                        $amount = count($items);
                        $amount = ($amount>10) ? 9 : $amount - 1;
                    ?>
                    <?php for ($i=0; $i<=$amount; $i++): ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="f_p_item">
                            <div class="f_p_img">
                                <!--<img class="img-fluid" src="img/product/feature-product/f-p-1.jpg" alt="">-->
                                <img class="img-fluid main-page-image" src="<?= $items[$i]->getMainImage() ?>" alt="">
                                <div class="p_icon">
                                    <a class="icon-link" href="#"><i class="lnr lnr-heart"></i></a>
                                    <a class="icon-link" href="#"><i class="lnr lnr-cart"></i></a>
                                </div>
                            </div>
                            <a href="#">
                                <h4>
                                    <?= $items[$i]->name ?>
                                </h4>
                            </a>
                            <h5>
                                &#8381
                                <?= $items[$i]->getPriceWithDiscount() ?>
                            </h5>
                        </div>
                    </div>
                    <?php endfor ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Latest Product Area =================-->
