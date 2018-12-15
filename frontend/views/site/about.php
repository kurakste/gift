<?php 
use yii\helpers\Url;
use yii\helpers\Html;

?>
<style>
    @media only screen and (min-device-width: 375px) and (max-device-width: 667px) {
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
                <h2>Контакты</h2>
                <div class="page_link">
                    <a href="<?= url::toRoute(['site/index']) ?>">Главная</a>
                    <a href="#">Контакты</a>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">

    <!--<div class="section-top-border text-right">
        <h3 class="mb-30 title_color">Оставьте ваш отзыв</h3>
        <div class="row">
            <div class="col-md-9">
                <div class="banner_content text-center">
                    <h2 class="h2Black">Оставьте ваш отзыв</h2>
                </div>
                <p class="textJustify">Over time, even the most sophisticated, memory packed computer can begin to run slow if we don’t do something to prevent it. The reason why has less to do with how computers are made and how they age and more to do with the way we use them. You see, all of the daily tasks that we do on our PC from running programs to downloading and deleting software can make our computer sluggish. To keep this from happening, you need to understand the reasons why your PC is getting slower and do something to keep your PC running at its best. You can do this through regular maintenance and PC performance optimization programs</p>
                <p class="textJustify">Before we discuss all of the things that could be affecting your PC’s performance, let’s talk a little about what symptoms</p>

            </div>
            <div class="col-md-3">
                <img src="/img/elements/d.jpg" alt="" class="img-fluid">
            </div>
        </div>
    </div>

    <div class="section-top-border">
        <div class="banner_content text-center">
            <h2 class="h2Black">Для предпинимателей</h2>
        </div>
        
        <div class="row">
            <div class="col-md-3">
                <img src="/img/elements/d.jpg" alt="" class="img-fluid">
            </div>


            <div class="col-md-9 mt-sm-20 left-align-p">
                <p class="textJustify">Recently, the US Federal government banned online casinos from operating in America by making it illegal to transfer money to them through any US bank or payment system. As a result of this law, most of the popular online casino networks such as Party Gaming and PlayTech left the United States. Overnight, online casino players found themselves being chased by the Federal government. But, after a fortnight, the online casino industry came up with a solution and new online casinos started taking root. These began to operate under a different business umbrella, and by doing that, rendered the transfer of money to and from them legal. A major part of this was enlisting electronic banking systems that would accept this new clarification and start doing business with me. Listed in this article are the electronic banking systems that accept players from the United States that wish to play in online casinos.</p>
            </div>
        </div>
    </div>

    <div class="section-top-border text-right">
        <div class="banner_content text-center">
            <h2 class="h2Black">Для партнеров</h2>
        </div>
        
        <div class="row">
            <div class="col-md-9">
                <p class="textJustify">Over time, even the most sophisticated, memory packed computer can begin to run slow if we don’t do something to prevent it. The reason why has less to do with how computers are made and how they age and more to do with the way we use them. You see, all of the daily tasks that we do on our PC from running programs to downloading and deleting software can make our computer sluggish. To keep this from happening, you need to understand the reasons why your PC is getting slower and do something to keep your PC running at its best. You can do this through regular maintenance and PC performance optimization programs</p>
                <p class="textJustify">Before we discuss all of the things that could be affecting your PC’s performance, let’s talk a little about what symptoms</p>
            </div>
            <div class="col-md-3">
                <img src="/img/elements/d.jpg" alt="" class="img-fluid">
            </div>
        </div>
    </div> -->

    <section class="contact_area p_120">
        <div class="container">
            <!--            <div id="mapBox" class="mapBox" data-lat="40.701083" data-lon="-74.1522848" data-zoom="13" data-info="PO Box CT16122 Collins Street West, Victoria 8007, Australia." data-mlat="40.701083" data-mlon="-74.1522848">
            </div> -->
            <div class="row">
                <div class="col-lg-3">
                    <div class="contact_info">

                        <div class="info_item">
                            <h6>Для связи с нами:</h6><br>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-home"></i>
                            <h6>Россия</h6>
                            <p>Татарстан</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-phone-handset"></i>
                            <h6><a href="#">0000000000</a></h6>
                            <p>ПН-ПТ с 9 до 18 по Мск</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-envelope"></i>
                            <h6><a href="#">support@my-pozdravim.com</a></h6>
                            <p>Писать можно в любое время!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Как к Вам можно обращаться">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Введите email">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Введите тему сообщения">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea class="form-control" name="message" id="message" rows="1" placeholder="Введите ваше сообщение"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="submit" value="submit" class="btn submit_btn">Отправить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--================Contact Area =================-->
</div>
