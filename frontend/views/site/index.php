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
                    <h3 class="mb-30 title_color" id = 'main-header'>СЕРТИФИКАТ</h3>
                    <p>Вам подарили такой сертификат?</p>
                    <p class='text-body'> Мы рады что нам доверили Вас поздравить. 
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
                    <h4 class="mb-30 title_color" id = 'main-header'>Покупателям:</h4>
                    <p class='text-body'>

                        Мы с нашими партнерами, каждый день придумываем для вас подарки. 
                        Хотим, что бы у вас была возможность одарить по достоинству  
                        любого и по любому поводу. Что-то необычное, яркое и запоминающееся. 
                        Думаем что эмоции - самый лучший подарок. Истории которые создают 
                        яркие позитивные эмоции мы упаковываем, что бы вы могли их дарить. 
                        Такой подарок вы можете отправить как открытку, можете подарить лично,
                        а можете подарить тайно и сохранить интригу. Еще, мы сами любим дарить подарки. 
                        Подписывайтесь на нас в соцсетях, участвуйте в конкурсах и получайте наши подарки. 
                        Для того, что бы начать поиск подарка в Вашем городе, выбирайте 
                        название города и нажмите кнопку "Подарки".
                    </p>
                    <a class="white_bg_btn" href="<?= Url::toRoute(['/site/category', 'city'=>$citycpu, 'fcats' => '_']) ?>">Выбрать подарок</a>

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

					<div class="section-top-border">
						<h3 class="mb-30 title_color">Партнерам.</h3>
						<div class="row">
							<div class="col-md-3">
								<img src="img/elements/d.jpg" alt="" class="img-fluid">
							</div>
							<div class="col-md-9 mt-sm-20 left-align-p">
                                <p>
                                Мы находим новых клиентов для наших партнеров. Фотографии, видео контент, дизайн, истории и привлечение трафика - это наша работа. Мы упакуем услугу и она станет стильным подарком. Продажи - это то, что мы любим и умеем. 
                                Партнерам мы предлагаем новый канал продаж. Например у вас сейчас есть картинг клуб в котором можно покататься на классных картах. Мы знаем как продать вас людям которые никогда не думали о картингах, но им нужен необычный подарок. На день рождения, на день нефтяника или как награду для лучшего отдела в организации. Вас смогут подарить - это совершенно новые для вас клиенты. Их не было у вас раньше. Они о вас не думали. Если вы при этом сумеете им понравиться - они к вам вернуться много раз и приведут  своих друзей. Через нас или напрямую к вам. Хотите попробовать? Оставьте свой контакт и сообщите удобное для вас время - мы свяжемся с вами. 
                                </p>
                                <form action="" method="post">
                                    <input type="text" name="" id="" value="" placeholder= 'телефон'/>
                                    <button class="btn sub-btn"><span class="lnr lnr-arrow-right"></span></button>		
                                </form>
							</div>
						</div>
					</div>

    </div>
</section>
<!--================End Deal Timer Area =================-->

<!--================Latest Product Area =================-->
<section class="feature_product_area latest_product_area">
    <div class="main_box">
        <div class="container">

					<div class="section-top-border text-right">
						<h3 class="mb-30 title_color">Предпринимателям</h3>
						<div class="row">
							<div class="col-md-9">
                                <p class="text-right">  
                                    Как запустить такой сервис в вашем городе?
                                </p>
                                <p class="text-right">
                                    Есть два варианта. Подождать. Мы планируем прийти во  
                                    все крупные города.  Своими силами или через наших партнеров.  
                                    Если вы предприниматель, любите работать, вам нравится наша идея 
                                    и вы хотите развивать её в вашем городе  - дайте нам знать. Мы 
                                    свяжемся с вами и обсудим возможные варианты. Оставьте нам ваш номер 
                                    телефона. Мы позвоним, нам нужны единомышленники. 
                                </p>
                                <form action="" method="post">
                                    <input type="text" name="" id="" value="" placeholder= 'телефон'/>
                                    <button class="btn sub-btn"><span class="lnr lnr-arrow-right"></span></button>		
                                </form>
							</div>
							<div class="col-md-3">
								<img src="img/elements/d.jpg" alt="" class="img-fluid">
							</div>
						</div>
                    </div>
        </div>
    </div>
</section>
<!--================End Latest Product Area =================-->
