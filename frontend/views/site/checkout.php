<?php 
    use yii\helpers\Url;
    use yii\helpers\Html;

?> 
<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content text-center">
                <h2>Оформление подарка</h2>
                <div class="page_link">
                    <a href="<?= Url::toRoute(['site/index']) ?>index.html">Главная</a>
                    <a href="#">Оформление подарка</a>
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
                <div class="col-lg-8">
                    <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                    <section class="sample-text-area">
                        <div class="container">
                            <h3 class="text-heading title_color">Даритель:</h3>
                            <p class="sample-text">
                                Введите пожалуйста действующий номер телефона и адрес Вашей электронной почты. Именно на почту вам придет электронный сертификат. Если потребуется востановление утраченного сертификата понадобится код, который мы отправляем на номер телефона. 

                            </p>
                        </div>
                    </section>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" id="from" name="from">
                            <span class="placeholder" data-placeholder="Введите удобное для вас обращение"></span>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="number" name="number">
                            <span class="placeholder" data-placeholder="Ваш номер телефона:"></span>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="email" name="compemailany">
                            <span class="placeholder" data-placeholder="Введите Email"></span>
                        </div>
                    <section class="sample-text-area">
                        <div class="container">
                            <h3 class="text-heading title_color">Адресат:</h3>
                            <p class="sample-text">
                                Введите пожалуйста удобное для адресата Имя и действующий номер телефона. 
                                После того, как адресат активирует сертификат мы свяжемся с ним по этому номеру телефона и сделаем все, 
                                что бы у него остались самые теплые впечатления от Вашего подарка. 
                            </p>
                        </div>
                    </section>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" id="from" name="from">
                            <span class="placeholder" data-placeholder="Введите удобное для вас обращение"></span>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" id="number" name="number">
                            <span class="placeholder" data-placeholder="Ваш номер телефона того, кому дарим подарок"></span>
                        </div>



                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="order_box">
                        <h2>Вы дарите:</h2>
                        <h3><?= $product->name ?> </h3>
                        <img src="<?= $product->getMainImage() ?>" alt="" style = "width: 90%;"/>


                        <p>-</p>
                        <p>
                            Вы покупаете подарочный сертификат. Он имеет ограниченый срок действия в ХХХХ дней. 
                        </p>
                        <p>
                            Если сертификат не будет использован в течении этого времени, он считается ??????? погашеным 
                        </p>
                        <p>
                            Время исполнения услуги нужно согласовывать заранее. Как правило это за 2 дня до желаемой даты, 
                        но есть исключения.... 
                        </p>
                        <p>
                            Часть наших услуг зависит от погоды. И мы будем вынуждены подстраиваться под обстоятельства.
                        </p>
                        
                        <div class="single-element-widget">
                            <div class="switch-wrap d-flex justify-content-between">
                                <p>С условиями согласен:</p>
                                <div class="primary-switch">
                                    <input type="checkbox" id="default-switch">
                                    <label for="default-switch"></label>
                                </div>
                            </div>
                        </div>
                        
                        <p>-</p>
                        
                        <a class="main_btn" href="#">Оплатить</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Checkout Area =================-->
