<?php 
    use yii\helpers\Url;
    use yii\helpers\Html;

?> 
<style>
    #pconteiner {
        text-align: center;
    }
    .myspin {
        font-size: 80px;
        margin: 0 auto;
    }
    .f_p_img img {
        border-radius:15px;
    }
</style>
<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content text-center">
                <h2>Категории подарков</h2>
                <div class="page_link">
                    <a href="<?= Url::toRoute(['site/index']) ?>">Главная</a>
                    <a href="#">Категории</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Category Product Area =================-->
<section class="cat_product_area p_120">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-9">
                <div class="product_top_bar">
                    <div class="left_dorp">
                    <p>Выбрать подарок в <span id="cityspan"></span> </p>
                    </div>
                    <div class="right_page ml-auto">
                        <nav class="cat_page" aria-label="Page navigation example">
                        </nav>
                    </div>
                </div>
                <div class="latest_product_inner row" id = 'pcontainer'>
                    <i class="fa fa-spinner myspin"></i>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="left_sidebar_area">
                    <aside class="left_widgets p_filter_widgets">
                        <div class="l_w_title">
                            <h3>Категории</h3>
                        </div>
                        <div class="widgets_inner">
                            <h4>Для кого подарок:</h4>
                            <ul class="list" id='fcatlist'>
                                <li><a href="" data-fcatid = '-99'>Все</a></li>
                                <?php foreach ($fcats as $fcat): ?>
                                    <li> <a href="" data-fcatid = '<?= $fcat->id ?>'><?= $fcat->name ?></a></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                        <div class="widgets_inner" >
                            <h4>Стиль подарка:</h4>
                            <!--  вывести сюда все подарки -->
                            <ul class="list" id='scatlist'>
                            <li><a href="#" data-scatid = '-99'>Все</a></li>
                            <?php foreach ($scats as $scat): ?>
                                <li ><a href="#"data-scatid = '<?= $scat->id ?>'><?= $scat->name ?></a></li>
                            <?php endforeach ?>
                            </ul>
                        </div>
                        <div class="widgets_inner">
                            <h4>По цене</h4>
                            <div class="range_item">
                                <div id="slider-range"></div>
                                <div class="row m0">
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Category Product Area =================-->

