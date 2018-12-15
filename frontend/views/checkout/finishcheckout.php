<?php 
    use yii\helpers\Url;
    use yii\helpers\Html;

?>

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
        <h3 class="title_confirmation">Название:<?= $cert->item->name ?> </h3>
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
                    <h4>Shipping Address</h4>
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
