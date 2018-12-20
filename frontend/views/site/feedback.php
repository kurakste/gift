<?php 
    use yii\helpers\Url;
    use yii\helpers\Html;

    $curentcity = $this->params['city'];
?>

<style>
        @media only screen and (min-width: 320px) and (max-width: 833px) {
            #fbform {
                margin-left: 5%;
                margin-right: 5%;

            }
        }

            #fbform {
                text-align: center;
            
            }        

            #btnSend {
            margin-top: 6%;
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
                    <a href="#">ОБРАТНАЯ СВЯЗЬ</a>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="section-top-border">
    <div class="row">
        <div class="col-lg-2 col-md-2">
        </div>
        <div class="col-lg-8 col-md-8" id='fbform'>
            <h3 class="mb-30 title_color">Форма обратной связи</h3>
            <form action="/site/feedback" method="post">
                <input type="hidden" name="<?=Yii::$app->request->csrfParam; ?>" value="<?=Yii::$app->request->getCsrfToken(); ?>">
                <div class="mt-10">
                    <input type="text" name="first_name" placeholder="Ваше имя" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ваше имя'" required="" class="single-input">
                </div>
                <div class="mt-10">
                    <input type="text" name="phone" placeholder="Телефон" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Телефон'" required="" class="single-input">
                </div>
                <div class="mt-10">
                    <textarea name='message' class="single-textarea" placeholder="Ваше сообщение" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ваше сообщение'" required=""></textarea>
                </div>
                <input class="genric-btn success radius" type="submit" name="btnSend" id="btnSend" value="Отправить" />
            </form>
        </div>
     </div> <!-- Element warp -->
</div>

