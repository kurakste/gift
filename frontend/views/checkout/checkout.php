<?php 
    use yii\helpers\Url;
    use yii\helpers\Html;

    $curentcity = $this->params['city'];


    $this->registerJsFile('/js/helper.js');
    $this->registerJsFile('/js/class/layoutclass.js');
    $this->registerJsFile('/js/class/checkoutclass.js');
    $this->registerJsFile('/js/checkout.js');
?>

<script>
    /* var globalPage = 'checkout'; */
</script>

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

        @media only screen and (min-width: 320px) and (max-width: 667px) {
            
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


        #errorTerms {
            padding-top:10px;
            color: #c5322d;
            display: none;
        }
        
        #errorPolicy {
            padding-top:10px;
            color: #c5322d;
            display: none;
        }
        


</style>

<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content text-center">
                <h2>ОФОРМЛЕНИЕ ПОДАРКА</h2>
                <div class="page_link">
                    <a href="<?= Url::toRoute(['site/index-city', 'city' => $curentcity->cpu]) ?> ?>">ГЛАВНАЯ</a>
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
                                    Введите пожалуйста действующий номер телефона и адрес Вашей электронной почты.
                                    На почту мы отправим вам электронный сертификат при оплате. 
                                </p>
                            </div>
                        </section>
                        <div class="col-md-12 form-group p_star">
                            <input 
                                type="text" 
                                class="form-control" 
                                id="from" 
                                name="from" 
                                placeholder="Имя:"
                                onfocus="this.placeholder=''" 
                                onblur="this.placeholder='Имя:' " 
                                required="true" 
                                form = 'getPaymentPageForm'
                            >
<!--                            <span class="placeholder" data-placeholder="Имя"></span> -->
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input 
                                type="text" 
                                class="form-control"   
                                id="fnumber" 
                                name="fphone" 
                                placeholder="Телефон:"
                                onfocus="this.placeholder=''" 
                                onblur="this.placeholder='Телефон' " 
                                required="true" 
                                form = 'getPaymentPageForm'
                            >
<!--                            <span class="placeholder" data-placeholder="Телефон:"></span>  -->
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input 
                                type="text" 
                                class="form-control" 
                                id="femail" 
                                name="femail" 
                                placeholder="Email:"
                                onfocus="this.placeholder=''" 
                                onblur="this.placeholder='Email' " 
                                required="true" 
                                form = 'getPaymentPageForm'
                            >
<!--                            <span class="placeholder" data-placeholder="Email"></span> -->
                        </div>
                        <section class="sample-text-area">
                            <div class="container">
                                <h3 class="text-heading title_color">Адресат:</h3>
                                <p class="sample-text">
                                    Введите пожалуйста удобное для адресата Имя и действующий номер телефона. 
                                    После того, как адресат активирует сертификат мы свяжемся с ним по этому 
                                    номеру телефона и сделаем все, что бы у него остались самые теплые впечатления 
                                    от Вашего подарка.
                                </p>
                            </div>
                        </section>
                        <div class="col-md-12 form-group p_star">
                            <input 
                                type="text" 
                                class="form-control" 
                                id="to" name="to" 
                                placeholder="Имя"
                                onfocus="this.placeholder=''" 
                                onblur="this.placeholder='Имя' " 
                                required="true" 
                                form = 'getPaymentPageForm'
                            >
<!--                            <span class="placeholder" data-placeholder="Как обратиться"></span> -->
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input 
                                type="text" 
                                class="form-control" 
                                id="tophone" 
                                name="tophone" 
                                placeholder="Телефон"
                                onfocus="this.placeholder=''" 
                                onblur="this.placeholder='Телефон' " 
                                required="true" 
                                form = 'getPaymentPageForm'
                            >
<!--                            <span class="placeholder" data-placeholder="Телефон"></span> -->
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <div class="order_box">
                        <h2>Вы дарите:</h2>
                        <h3>
                            <?= $product->name ?>
                        </h3>
                        <img src="<?= $product->getMainImage() ?>" alt="" />
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


                        <div class="single-element-widget">

                            <div class="switch-wrap d-flex justify-content-between">
                                <p>С условиями сертификата согласен:</p>
                                <div class="primary-switch">
                                    <input type="checkbox" id="certtermsswch">
                                    <label for="certtermsswch"></label>
                                </div>
                            </div>
                            <div class="switch-wrap d-flex justify-content-between">
                                <p style="width:80%">С политикой по использованию персональных данных согласен:</p>
                                <div class="primary-switch">
                                    <input type="checkbox" id="ppolicyswch">
                                    <label for="ppolicyswch"></label>
                                </div>
                            </div>
                            <div class="switch-wrap d-flex justify-content-between">
                                <p>Подарить инкогнито:</p>
                                <div class="confirm-switch">
                                    <input type="checkbox" id="incognitoswitch">
                                    <label for="incognitoswitch"></label>
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
                                <input class="main_btn" type="submit" name="" id="sbmtBtn" value="Оформить" />
                                <p id='errorTerms'>
                                    Необходимо согласиться с условиями сертификата.
                                </p>
                                <p id='errorPolicy'>
                                    Необходимо согласиться с политикой по использованию персональных данных.
                                </p>
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
