<?php
use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;

$citycpu = $this->params['citycpu'];
$cities = $this->params['cities'];
$curentcity = $this->params['city'];

$this->registerJsFile('/js/helper.js');
$this->registerJsFile('/js/class/layoutclass.js');
$this->registerJsFile('/js/class/mainpageclass.js');
$this->registerJsFile('/js/main.js');


?>

    <style>
        #SelectCityDiv {
            margin-top: 80px;
            margin-bottom: 80px;
        }

        @media screen and (min-width: 767px) {
            .smallcertificateformobileversion {
                display: none;
            }

        }

        #main-header {
            margin-top: 70px;
        }

        #cert_error {
            display: none;
            color: red;
        }

        #cert_act_error {
            display: none;
            color: red;
        }

        #cert_work {
            display: none;
            color: green;
        }

        #cert_done {
            display: none;
            color: green;
        }

        .container {
            text-align: justify;
        }

        #certDetailBtn {
            margin-bottom: 10px;
        }

        #certActivateBtn {
            margin-bottom: 10px;
        }

        /* #firstBtn { */
        /*     margin-left: 15px; */
        /*     width: 165px; */
        /*     height: 52px; */
        /* } */

        .text-body {
            text-align: justify;
        }

        .text_just {
            text-align: justify;
        }

        /* .phone-field { */
        /*     width: 200px; */
        /*     margin: 0px; */
        /* } */

        /* .feedback-form { */
        /*     width: 400px; */
        /* } */

        .add_to_btn {
!important           padding-top: 10px;
            padding-bottom: 10px;
            border-radius: 5px;
        }

        #cert_input {
            max-width: 400px;
            margin-bottom: 10px;
        }

        /* .send-phone-button{ */

        /*     background-color: #C33332 */

        /* } */

        .input_phone {
            color: rgb(153, 153, 153);
            height: 40px;
            text-decoration: none solid rgb(153, 153, 153);
            text-size-adjust: 100%;
            touch-action: manipulation;
            width: 289.984px;
            column-rule-color: rgb(153, 153, 153);
            perspective-origin: 144.984px 20px;
            transform-origin: 144.984px 20px;
            caret-color: rgb(153, 153, 153);
            border: 1px solid rgb(255, 255, 255);
            font: normal normal 400 normal 13px / 30px Roboto, sans-serif;
            outline: rgb(153, 153, 153) none 0px;
            padding: 1px 40px 1px 20px;
        }

        .main-page-image {
            width: 100%;
            margin-top: 120px;   
            border-radius:15px!important;
            box-shadow: 0 0 10px rgba(0,0,0,0.3);

        }

        .clearfix:after {
            visibility: hidden;
            display: block;
            font-size: 0;
            content: " ";
            clear: both;
            height: 0;
        }

        .clearfix {
            display: inline-block;
        }


        /* start commented backslash hack \*/

        * html .clearfix {
            height: 1%;
        }

        .clearfix {
            display: block;
        }

        /* close commented backslash hack */

        #raw_but {
            padding-bottom: 50px;
        }

        .BtnCenter {
            text-align: center;
            margin-bottom: 20px;
        }


        @media only screen and (min-device-width: 768px) and (max-device-width: 714px) {
            .white_bg_btn {
                margin-bottom: 30px;
            }
            .centeredbtnindex {
                margin-bottom: 30px;
            }
        }


        @media only screen and (min-device-width: 320px) and (max-device-width: 667px) {

            .body {
                width: 95%;
            }
            #imageSmall {
                background-image: url("/img/vaucher-exp-small.png");

            }

            .smallcertificateformobileversion {
                display: inline;
                width: 40%;
                height: 40%;
            }

            .text-body {
                width: 95%;
                margin-right: 10px;
            }

            .icon-bar {
                margin-right: 10px;
            }

            .navbar-toggler {
                margin-right: 10px;
            }
            .single-input {
                width: 85%;
            }

            .main-header1 {
                font-size: 16px;
            }

            .text_just {
                width: 95%;
            }
            #main-header {
                text-align: center;
            }
            .white_bg_btn {
                margin-left: 25%;
                text-align: center;
                width: 70%;
                height: 70%;
                font-size: 70%;
                margin-top: 10px;
            }
            .BtnSpecify {
                margin-left: 25%;
                text-align: center;
            }

            .main-header2 {
                margin-right: 50px;
                text-align: center;
            }

            .white_bg_btn {
                float: left;
                /*margin: 0 10px 15px 0;*/
                /*margin-bottom: 15px;*/
                width: 150px;
                height: 50px;
            }

            #secondBtn {
                margin-bottom: 15px;
            }

            .cityListIndex {
                float: left;
                margin: 0 0 5 50px;
            }

            /*.header_area .navbar .nav .nav-item .nav-link {
                line-height: 25px;
            }*/
            .nav-link {
                margin-left: 25px;
                margin-right: 50px;
            }
        }

        @media only screen and (min-device-width: 1024px) and (max-device-width: 1366px) {
            #main-header {
                margin-top: 2500px;
            }
            .nav-item {
                margin-left: 25px;
                margin-right: 50px;
            }

            .home_banner_area .banner_inner .banner_content h3 {
                margin-bottom: -14px;
                font-size: 38px;
            }

            .navbar {
                width: 90%;
            }

            #main-header {
                text-align: center;
            }
            .li {
                margin-left: 25px;
            }
            */ @media only screen and (min-device-width: 1024px) and (max-device-width: 1366px) {
                #main-header {
                    margin-top: 2500px;
                }

                .centeredText {
                    margin-left: 120px;
                }

            }

            #main-header {
                text-align: center;
            }

            #cert_error {
                display: none;
                color: red;
            }

            #cert_act_error {
                display: none;
                color: red;
            }

            #cert_work {
                display: none;
                color: green;
            }

            #cert_done {
                display: none;
                color: green;
            }

    </style>

    <script>
        var globalPage = 'main';
    </script>

    <section class="home_banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content row">
                    <div class="col-lg-5"><br><br>
                        <h3 class="mb-30 title_color" id='main-header'>СЕРТИФИКАТ</h3>
                        <p class='text_just'>Вам подарили похожий сертификат?</p>
                        <div id="imageSmall"></div>
                        <p class='text_just'> Мы рады что нам доверили Вас поздравить. Сделаем все что бы вы получили удовольствие от вашего подарка. Введите пожалуйста код сертификата.
                        </p><br>
                        <input id="cert_input" type="text" name="certificate" placeholder="Введите код сертификата" onfocus="this.placeholder = 'XХXX-XXXXXX'" onblur="this.placeholder = 'Введите код сертификата'" required class="single-input">
                        <p id='cert_error'>
                            Сертификат не найден в базе. Проверте пожалуйста код.
                        </p>
                        <p id='cert_act_error'>
                            Не удалось активировать ваш сертификат. Отправьте пожалуйста ваше имя и номер телефона через данную форму. Мы вам перезвоним и решим возникшую проблему.
                        </p>
                        <p id='cert_work'>
                            Подождите минуту. Работаю.
                        </p>
                        <p id='cert_done'>
                            Ваш сертификат успешно активирован. Мы позвоним вам в течении 3х рабочих часов.
                        </p>
                        <br>
                        <p class='text_just'>
                            Кнопка "Уточнить" переведет вас на страницу с подробным описанием товара. Кнопка "активировать" - активация подарка. Нажмите ее и мы свяжимся для уточнения деталей организации вашего мероприятия.
                        </p>
                        <a class="white_bg_btn" id="certDetailBtn" href="">Уточнить</a>
                        <a class="white_bg_btn" id="certActivateBtn" href="">Активировать</a>
                    </div>
                    <div class="col-lg-7">
                        <div class="halemet_img">
                            <img class="main-page-image" src="/img/vaucher-exp.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--================Feature Product Area =================-->
    <!-- <section class="home_banner_area"> -->
    <section class="feature_product_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="raw">

                    <div class="banner_content row" id="SelectCityDiv">
                        <div class="col-lg-5">
                            <div class="centeredText">
                                <h4 class="mb-30 title_color" id='main-header'>ПОКУПАТЕЛЯМ</h4>
                            </div>
                            <!-- <h4 class="mb-30 title_color" id='main-header'>ПОКУПАТЕЛЯМ</h4> -->
                            <p class='text_just'>
                                Мы с нашими партнерами, каждый день придумываем для вас подарки. Хотим, что бы у вас была возможность одарить по достоинству любого и по любому поводу. Что-то необычное, яркое и запоминающееся. Думаем что эмоции - самый лучший подарок. Истории которые создают яркие позитивные эмоции мы упаковываем, что бы вы могли их дарить. Такой подарок вы можете отправить как открытку, можете подарить лично, а можете подарить тайно и сохранить интригу. Еще, мы сами любим дарить подарки. Подписывайтесь на нас в соцсетях, участвуйте в конкурсах и получайте наши подарки. Для того, что бы начать поиск подарка выбирайте Ваш город и мы переведем Вас на нужную страничку.
                            </p>

                            <select class="cityListIndex" id='citieslist2' name='city2'>
                            <?php foreach ($cities as $city): ?>
                                <option 
                                    <?php if ($curentcity->id == $city->id) echo "selected"; ?>
                                value ="<?= $city->id ?>"><?= $city->name ?></option>
                            <?php endforeach ?>
                            </select>
                            <div>

                            </div>
                            <!-- row -->

                        </div>
                        <div class="col-lg-7">
                            <div class="">
                                <img class="main-page-image" id="clientImage" src="/img/cover/main_cover_1200.jpeg" alt="" width="100%">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- container -->
            </div>
    </section>
    <!--================End Feature Product Area =================-->

    <!--================Deal Timer Area =================-->

    <section class="feature_product_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="section-top-border">
                    <h3 class="mb-30 title_color" id='main-header'>ПАРТНЕРАМ</h3>
                    <div class="row">
                        <div class="col-md-3">
                            <img src="img/partnership.jpg" alt="" class="img-fluid" id="imgMobile">
                        </div>
                        <div class="col-md-9 mt-sm-20 left-align-p">
                            <p class='text_just'>
                                Мы находим новых клиентов для наших партнеров. Фотографии, видео контент, дизайн, истории и привлечение трафика - это наша работа. Мы упакуем услугу и она станет стильным подарком. Продажи - это то, что мы любим и умеем. Партнерам мы предлагаем новый канал продаж. Например у вас сейчас есть картинг клуб в котором можно покататься на классных картах. Мы знаем как продать вас людям которые никогда не думали о картингах, но им нужен необычный подарок. На день рождения, на день нефтяника или как награду для лучшего отдела в организации. Вас смогут подарить - это совершенно новые для вас клиенты. Их не было у вас раньше. Они о вас не думали. Если вы при этом сумеете им понравиться - они к вам вернуться много раз и приведут своих друзей. Через нас или напрямую к вам. Хотите попробовать? Оставьте свой контакт и сообщите удобное для вас время - мы свяжемся с вами.
                            </p>
                            <a class="white_bg_btn add_to_btn" id='main-header' href="<?= Url::toRoute(['/site/call']) ?>">Заказать звонок</a>
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
                            <a class="white_bg_btn add_to_btn" id='main-header' href="<?= Url::toRoute(['/site/call']) ?>">Заказать звонок</a>
                        </div>
                        <div class="col-md-3">
                            <img class="imgMobile" src="img/thoughtfully.jpg" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </section>
    <!--================End Latest Product Area =================-->
