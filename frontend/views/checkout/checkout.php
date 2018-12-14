<?php 
    use yii\helpers\Url;
    use yii\helpers\Html;

?>

<script>
    var globalPage = 'checkout';

</script>

<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content text-center">
                <h2>ОФОРМЛЕНИЕ ПОДАРКА</h2>
                <div class="page_link">
                    <a href="<?= Url::toRoute(['site/index']) ?>">ГЛАВНАЯ</a>
                    <a href="#">ОФОРМЛЕНИЕ ПОДАРКА</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Checkout Area =================-->
<section class="checkout_area p_120">
    <div class="container">
        <div class="billing_details">
            <div class="row">
                <div class="col-lg-6">
                    <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                        <section class="sample-text-area">
                            <div class="container">
                                <h3 class="text-heading title_color">Даритель:</h3>
                                <p class="sample-text">
                                    Введите пожалуйста действующий номер телефона и адрес Вашей электронной почты. На почту мы отпавим вам электронный сертификат при оплате. На эту же почту мы отправим сертификат и при востановлии утраченного.
                                </p>
                                <p>
                                    Обещаем Вам что ни телефон ни адрес электронной почты не будут использоваться для любого рода рассылок. Мы не передаем информация третьим лицам.
                                </p>
                            </div>
                        </section>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" id="from" name="from" form = 'getPaymentPageForm'>
                            <span class="placeholder" data-placeholder="Введите удобное для вас обращение"></span>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="fnumber" name="fphone" form = 'getPaymentPageForm'>
                            <span class="placeholder" data-placeholder="Ваш номер телефона:"></span>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="femail" name="femail" form = 'getPaymentPageForm'>
                            <span class="placeholder" data-placeholder="Введите Email"></span>
                        </div>
                        <section class="sample-text-area">
                            <div class="container">
                                <h3 class="text-heading title_color">Адресат:</h3>
                                <p class="sample-text">
                                    Введите пожалуйста удобное для адресата Имя и действующий номер телефона. После того, как адресат активирует сертификат мы свяжемся с ним по этому номеру телефона и сделаем все, что бы у него остались самые теплые впечатления от Вашего подарка.
                                </p>
                            </div>
                        </section>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" id="to" name="to" form = 'getPaymentPageForm'>
                            <span class="placeholder" data-placeholder="Введите удобное для вас обращение"></span>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" id="tophone" name="tophone" form = 'getPaymentPageForm'>
                            <span class="placeholder" data-placeholder="Ваш номер телефона того, кому дарим подарок"></span>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <div class="order_box">
                        <h2>Вы дарите:</h2>
                        <h3>
                            <?= $product->name ?>
                        </h3>
                        <img src="<?= $product->getMainImage() ?>" alt="" style="width: 90%;" />
                        <p></p>
                        <p>
                            Вы покупаете подарочный сертификат. Он имеет ограниченый срок действия в
                            <?= $product->lifetime ?> дней.
                        </p>
                        <p>
                            Если сертификат не будет использован в течении этого времени, он считается погашеным
                        </p>
                        <p>
                            Время исполнения услуги нужно согласовывать заранее. Как правило это за 7 дней до желаемой даты, но есть исключения. Прочтите внимательно условия.
                        </p>
                        <p>
                            Часть наших услуг зависит от погоды. И мы будем вынуждены подстраиваться под обстоятельства.
                        </p>

                        <!--<div class="single-element-widget">
                            <div class="switch-wrap d-flex justify-content-between">
                                <p>С условиями сертификата согласен:</p>
                                <div class="primary-switch">
                                    <input type="checkbox" id="default-switch">
                                    <label for="default-switch"></label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="single-element-widget">
                            <div class="switch-wrap d-flex justify-content-between">
                                <p>С политикой по использованию персональных данных согласен:</p>
                                <div class="primary-switch">
                                    <input type="checkbox" id="default-switch1">
                                    <label for="default-switch"></label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="single-element-widget">
                            <div class="switch-wrap d-flex justify-content-between">
                                <p>Подарить инкогнито:</p>
                                <div class="primary-switch1">
                                    <input form='getPaymentPageForm' type="checkbox" id="default-switch2">
                                    <label for="default-switch"></label>
                                </div>
                            </div>
                        </div> -->

                        <div class="single-element-widget">

                            <div class="switch-wrap d-flex justify-content-between">
                                <p>С условиями сертификата согласен:</p>
                                <div class="primary-switch">
                                    <input type="checkbox" id="default-switch">
                                    <label for="default-switch"></label>
                                </div>
                            </div>
                            <div class="switch-wrap d-flex justify-content-between">
                                <p>С политикой по использованию персональных данных согласен:</p>
                                <div class="primary-switch">
                                    <input type="checkbox" id="primary-switch">
                                    <label for="primary-switch"></label>
                                </div>
                            </div>
                            <div class="single-element-widget">
                                <div class="switch-wrap d-flex justify-content-between">
                                    <p>Подарить инкогнито:</p>
                                    <div class="primary-checkbox">
                                        <input type="checkbox" id="default-checkbox">
                                        <label for="default-checkbox"></label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <p><strong>Полная стоимость услуги составляет: &#8381 <?= $product->getActualPrice()?> </strong></p>
                            <form action="/checkout/get-payment-page" method="POST" id='getPaymentPageForm'>
                                <?= Html :: hiddenInput(\Yii :: $app->getRequest()->csrfParam, \Yii :: $app->getRequest()->getCsrfToken(), []) ?>
                                <input type='hidden' name="productcpu" id="productcpu" value="<?= $product->cpu ?>" />
                                <input type="hidden" name="acs_uri" id="acs_uri" value="<?= $pparam['acs_uri'] ?>" />
                                <input type="hidden" name="cps_context_id" id="cps_context_id" value="<?= $pparam['cps_context_id'] ?>" />
                                <input type="hidden" name="paymentType" id="paymentType" value="<?= $pparam['paymentType'] ?>" />
                                <input type="hidden" name="certid" id="certid" value="<?= $certid ?>" />
                                <input class="main_btn" type="submit" name="" id="" value="Оформить" />
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Checkout Area =================-->
<!--
                            <form action="<?// $acs_uri ?>" method="post">
                                <input type='hidden' name="cps_context_id" id="cps_context_id" value="<? //$cps_context_id ?>" />
                                <input type="hidden" name="paymentType" id="paymentType" value="<? //$paymentType ?>" />
                                <input type="submit" name="" id="" value="Оплатить" />
                            </form>
-->
