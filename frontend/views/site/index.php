<?php
use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;

$citycpu = $this->params['citycpu'];
$curentcity = $this->params['city'];

?>

<style>
    #SelectCityDiv {
        margin-top:80px;
        margin-bottom: 80px;
    }

    .text-body {
        text-align: justify;
    }

</style>

<script>
    var globalPage = 'main';
</script>

<section class="home_banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content row">
                <div class="col-lg-5">
                    <h3 class="mb-30 title_color" id = 'main-header'>Активация сертификата</h3>
                    <p>Вам подарили такой сертификат?</p>
                    <p class='text-body'> Здорово!!! Мы рады что нам доверили Вас поздравить. 
                        Сделаем все что бы вы получили удовольствие от вашего подарка.
                        Жмите кнопку "Поехали" и мы расскажем Вам подробнее о вашем подарке. 
                    </p>
                    <!--<a class="white_bg_btn" href="#">Выбрать подарок</a>-->
                    <a class="white_bg_btn" href="<?= Url::toRoute(['/site/activate']) ?>">Поехали</a>

                </div>
                <div class="col-lg-7">
                    <div class="halemet_img">
                        <img class='main-page-image' src="/img/vaucher-exp.png" alt="" width="100%">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--================Feature Product Area =================-->
<section class="feature_product_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content row" id="SelectCityDiv">
                <div class="col-lg-5" >
                    <h4 class="mb-30 title_color" id = 'main-header'>Подобрать подарок в вашем городе</h4>
                    <p class='text-body'>
                        Для того, что бы начать поиск подарка в Вашем городе, выбирете 
                        название Вашего города и нажмите кнопку "Подарки".
                    </p>
                    <a class="white_bg_btn" href="<?= Url::toRoute(['/site/category', 'city'=>$citycpu, 'fcats' => '_']) ?>">Подарки</a>

                </div>
                <div class="col-lg-7">
                    <div class="halemet_img">
                        <img class='main-page-image' src="/img/cover/main_cover_1200.jpeg" alt="" width="100%">
                    </div>
                </div>
            </div>
        </div>
</section>
<!--================End Feature Product Area =================-->

<!--================Deal Timer Area =================-->
<section class="timer_area">
    <div class="container">
    </div>
</section>
<!--================End Deal Timer Area =================-->

<!--================Latest Product Area =================-->
<section class="feature_product_area latest_product_area">
    <div class="main_box">
        <div class="container">
        </div>
    </div>
</section>
<!--================End Latest Product Area =================-->
