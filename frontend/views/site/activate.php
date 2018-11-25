<?php 
    use yii\helpers\Url;
    use yii\helpers\Html;

?> 
    
<script>
    var globalPage = 'activate';
</script>

<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content text-center">
                <h2>Активация подарка</h2>
                <div class="page_link">
                    <a href="<?= Url::toRoute(['site/index']) ?>">Главная</a>
                    <a href="#">Активировать</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<section class="sample-text-area">
    <div class="container">
        <h3 class="text-heading title_color">Добро пожаловать!</h3>
        <p class="sample-text">
            Мы в двух шагах от того момента когда вы сможите получить 
            удовольствие от вашего подарка. Вам нужно активировать сертификат. 
            Для этого найдите код сертификата и введите в поле  "Код сертификата".
            После этого нажмите кнопку активировать код. Это все. Делать больше ничего не нужно. С вами свяжутся в течении
            трех рабочих часов. Единственное уточнение - мы работаем по московскому
            времени.
       </p> 
        <p class="sample-text">
            Если вы хотите получить долучить дополнительную консультацию по поводу 
            вашего подарка, нажмите кнопку получить консультацию. 
        </p>
    </div>
</section>


<div class="whole-wrap">
    <div class="container">
        <div class="section-top-border">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <h3 class="mb-30 title_color">ФОРМА АКТИВАЦИИ ПОДАРКА</h3>
                    <form action="#">
                        <div class="mt-10">
                            <input type="text" name="first_name" placeholder="Введите удобное для Вас обращение" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Введите удобное для Вас обращение'" required class="single-input">
                        </div>
                        <div class="mt-10">
                            <input type="text" name="certificate" placeholder="Введите код сертификата" onfocus="this.placeholder = 'XXX-XXXXXX'" onblur="this.placeholder = 'Введите код сертификата'" required class="single-input">
                        </div>
                        <div class="mt-10">
                            <input class="main_btn"type="submit" name="" id="" value="Активировать" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
