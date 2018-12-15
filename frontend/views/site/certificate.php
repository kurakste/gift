<?php 
    use yii\helpers\Url;
    use yii\helpers\Html;

$this->registerJsFile('/js/helper.js');
$this->registerJsFile('/js/class/layoutclass.js');
$this->registerJsFile('/js/class/mainpageclass.js');
$this->registerJsFile('/js/main.js');

$curentcity = $this->params['city'];
?>

<script>
    var globalPage = 'activate';

</script>

<style type="text/css" media="all">
        .banner_content {
            padding-bottom: 50px;
        }
        .main-page-image {
            width: 100%;
            margin-top: 120px;
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

        .text-body {
            text-align: justify;
        }

        .text_just {
            text-align: justify;
        }

        .add_to_btn {
            padding-top: 10px;
            padding-bottom: 10px;
            border-radius: 5px;
        }

        #cert_input {
            max-width: 400px;
            margin-bottom: 10px;
        }
    
</style>

<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content text-center">
                <h2>СЕРТИФИКАТ</h2>
                <div class="page_link">
                    <a href="<?= Url::toRoute(['site/index-city', 'city' => $curentcity->cpu]) ?>">ГЛАВНАЯ</a>
                    <a href="#">СЕРТИФИКАТ</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->
    <section class="">
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
                            <img class='main-page-image' src="/img/vaucher-exp.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<div class="whole-wrap">
    <div class="container">
    </div>
</div>
