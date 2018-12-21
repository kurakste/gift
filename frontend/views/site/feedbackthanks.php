<?php 
    use yii\helpers\Url;
    use yii\helpers\Html;

    $curentcity = $this->params['city'];
?>

<style>
        @media only screen and (min-width: 320px) and (max-width: 714px) {
            #fbform {
                margin-left: 5%;
                margin-right: 5%;

            }
        }

            #fbform {
                text-align: center;
            
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
            <h3>Сообщение успешно отправлено. Спасибо. </h3>
            <p> 
                Огромное спасибо за то, что вам не безразличен наш сервис. 
                Мы приложем все усилия, что бы сделать его лучше для вас. 
                Спасибо. 
            </p>
        </div>
     </div> <!-- Element warp -->
</div>
