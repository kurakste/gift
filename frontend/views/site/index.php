<section class="home_banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content row">
                <div class="col-lg-5">
                    <!--  сюда писать описание услуги и краткий комент как работает по кнопке переход на видео презу -->
                    <h3>Хочется, чтобы улыбок вокруг было больше!</h3>
                    <p>Мы помогаем вам создать праздник для своих близких: вы можете поздравить их находясь в другом городе.<br>Вы можете сделать командный подарок для своих коллег. <br>Как это работает?</p>
                    <!--<a class="white_bg_btn" href="#">Выбрать подарок</a>-->
                    <a class="white_bg_btn" href="#">Выбрать подарок</a>

                </div>
                <div class="col-lg-7">
                    <div class="halemet_img">
                        <!--шлем заменить на рисунок образ подарка 
                        <img src="img/banner/helmat.png" alt=""> -->
                        <img src="img/gift_index.png" alt="" width="80%">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--================Feature Product Area =================-->
<!--сделать закругления и размер уменьшить-->

<section class="feature_product_area">
    <div class="main_box">
        <div class="container">
            <div class="row hot_product_inner">
                <?php for ($i =0; $i<=1; $i++):  ?>
                <div class="col-lg-6">
                    <div class="hot_p_item">
                        <img class="img-fluid" src="<?= $fcats[$i]->image ?> " alt="">
                        <div class="product_text">
                            <!--категория подарка для вас М и Ж -->
                            <h4>
                                <?= $fcats[$i]->description ?>
                            </h4>
                            <a href="/cats/<?= $fcats[$i]->cpu ?>">Перейти к выбору</a>
                        </div>
                    </div>
                </div>
                <?php endfor ?>
            </div>
            <div class="feature_product_inner">
                <div class="main_title">
                    <h2>Лучшие подарки в наших коллекциях</h2>
                    <!--выбор категорий переход следующий слайд просто переход-->
                    <p>У нас вы найдете способ поздравить своих близких, знакомых, родных, коллег.</p><br>
                    <!--<a class="white_bg_btn" href="#">Выбрать подарок</a>-->
                    <a class="main_btn" href="#">Купить сейчас</a>
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
            <h2>Всегда лучшие варианты для поздравлений!</h2>
            <!--<p>Мы поможем выбрать лучшее для вашего подарка</p>
            <a class="main_btn" href="#">Выбирайте</a> -->
            <img class="img-fluid" src="img/gift_for_index.png" alt="">
            <img class="img-fluid" src="img/gift_for_index.png" alt="">
            <img class="img-fluid" src="img/gift_for_index.png" alt="">
        </div>
        <!--<div class="timer_inner">
            <div id="timer" class="timer">
                <div class="timer__section days">
                    <div class="timer__number"></div>
                    <div class="timer__label">дней</div>
                </div>
                <div class="timer__section hours">
                    <div class="timer__number"></div>
                    <div class="timer__label">часов</div>
                </div>
                <div class="timer__section minutes">
                    <div class="timer__number"></div>
                    <div class="timer__label">минут</div>
                </div>
                <div class="timer__section seconds">
                    <div class="timer__number"></div>
                    <div class="timer__label">секунд</div>
                </div>
            </div>
        </div>-->
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
                                <img class="img-fluid" src="<?= $items[$i]->getMainImage() ?>" alt="">
                                <div class="p_icon">
                                    <a href="#"><i class="lnr lnr-heart"></i></a>
                                    <a href="#"><i class="lnr lnr-cart"></i></a>
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
