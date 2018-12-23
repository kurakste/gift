<?php 
    use yii\helpers\Url;
    use yii\helpers\Html;

?>

<style> 
        .checkout_area {
            padding-top: 50px;
        }

        p {
            text-align: justify;
        }

        img {
            width: 90%;
            margin-left: 5%;
        }

        .main_btn {
            width: 50%;
            margin-left: 25%;
        }
        .sample-text-area {
            padding: 0px;
            margin-bottom: 10px !important;
        }
        .text-heading {
            margin-bottom: 15px ! important;
        }

        .main_btn { 
            margin-bottom: 10px;
        }

        .title_confirmation {
            margin-bottom:20px !important;
        }

        @media only screen and (min-width: 320px) and (max-width: 769px) {
            .order_details {
                padding-top: 40px !important;
            }
            
            h2 {
                font-size: 14pt !important;
            }
            
            .banner_inner {
                min-height: 200px !important;
            }
            
            .banner_area {
                min-height: 0px !important;
            }
            
            .page_link a{
                /* font-size: 8pt !important; */
            }
            .sample-text-area {
                padding: 0px;
            }
        }
</style>
<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content text-center">
                <h2>ПОДТВЕРЖДЕНИЕ И ОПЛАТА</h2>
                <div class="page_link">
                    <a href="<?= Url::toRoute(['site/index']) ?>">ГЛАВНАЯ</a>
                    <a href="confirmation.html">ПОДТВЕРЖДЕНИЕ</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Order Details Area =================-->
<section class="order_details p_120">
    <div class="container">
        <h3 class="title_confirmation">Для вас подготовлен сертификат №<?= $cert->certid ?> </h3>
        <h3 class="title_confirmation">"<?= $cert->item->name ?>"</h3>
        <div class="row order_d_inner">
            <div class="col-lg-4">
                <div class="details_item">
                    <h4>ДАРИТЕЛЬ</h4>
                    <ul class="list">
                        <li><a href="#"><span>Имя</span> : <?= $cert->donor_name ?></a></li>
                        <li><a href="#"><span>Телефон</span> : <?= $cert->donor_phone ?></a></li>
                        <li><a href="#"><span>email</span> : <?= $cert->donor_email ?></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="details_item">
                    <h4>ПОЛУЧАТЕЛЬ ПОДАРКА</h4>
                    <ul class="list">
                        <li><a href="#"><span>Обращение</span> : <?= $cert->recipient_name ?></a></li>
                        <li><a href="#"><span>Телефон</span> : <?= $cert->recipient_phone ?></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="details_item">
                    <h4>Данные сертификата</h4>
                    <ul class="list">
                    <li><a href="#"><span>Номер</span> : <?= $cert->certid ?></a></li>
                        <li><a href="#"><span>Город</span> : <?= $cert->item->venders->city->name ?></a></li>
                        <li><a href="#"><span>Действителен дней: </span> : <?= $cert->item->lifetime ?></a></li>
                        <li><a href="#"><span>Стоимость: </span> : <?= $cert->item->getActualPrice() ?></a></li>
                    </ul>
                </div>
            </div>

    </div>
                <div class="order_details_table">
                    <h2>Прочитайте пожалуйста:</h2>
                    <div class="table-responsive">
                        <P> Проверте пожалуйста внимательно все поля формы. Если необходимо вернитесь назад и внесите изменения. 
                            Если все заполнено правильно, вы в одном шаге до получения сертификата. 
                            После нажатия кнопки оплатить, мы переведем вас на страницу оплаты, сегодя мы используем ЯндексДеньги.
                            При успешной оплате у вас в браузере откроется сертификат, который вы сможете сохранить (на компьютер или в телефон).
                            Такой же сертификат будет отправлен на адрес электронной почты, которую вы указали. 
                            Если что-то пойдет не так - закажите обратный звонок и мы вам обязательно поможем. Единственное что вам 
                            Нужно скопировать и записать - это номер сертификата. 
                        </p>
                        <a class = "main_btn" href="/checkout?product=<?= $cert->item->cpu ?>">Назад</a>
                        <form action="<?= $acs_uri ?>" method="post">
                            <input type="hidden" name="cps_context_id" id="cps_context_id" value="<?= $cps_context_id ?>" />
                            <input type="hidden" name="paymentType" id="paymentType" value="<?= $paymentType ?>" />
                            <input class="main_btn" type="submit" name="" id="" value="Оплатить" />
                        </form>
                    </div>
                </div>
</section>
