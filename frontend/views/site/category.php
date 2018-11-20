<?php 
    use yii\helpers\Url;
    use yii\helpers\Html;
// $this->registerJsFile('/js/category.js');

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
                    <!--<aside class="left_widgets cat_widgets">
                        <div class="l_w_title">
                            <h3>Выбор категории</h3>
                        </div>
                        <div class="widgets_inner">
                            <ul class="list">
                                <li><a href="#">Fruits and Vegetables</a></li>
                                <li>
                                    <a href="#">Meat and Fish</a>
                                    <ul class="list">
                                        <li><a href="#">Frozen Fish</a></li>
                                        <li><a href="#">Dried Fish</a></li>
                                        <li><a href="#">Fresh Fish</a></li>
                                        <li><a href="#">Meat Alternatives</a></li>
                                        <li><a href="#">Meat</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Cooking</a>
                                    <ul class="list">
                                        <li><a href="#">Frozen Fish</a></li>
                                        <li><a href="#">Dried Fish</a></li>
                                        <li><a href="#">Fresh Fish</a></li>
                                        <li><a href="#">Meat Alternatives</a></li>
                                        <li><a href="#">Meat</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Beverages</a>
                                    <ul class="list">
                                        <li><a href="#">Frozen Fish</a></li>
                                        <li><a href="#">Dried Fish</a></li>
                                        <li><a href="#">Fresh Fish</a></li>
                                        <li><a href="#">Meat Alternatives</a></li>
                                        <li><a href="#">Meat</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Home and Cleaning</a></li>
                            </ul>
                        </div>
                    </aside>-->
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
<!--
                                <li><a href="#">Для мужчин</a></li>
                                <li><a href="#">Для женщин</a></li>
                                <li class="active"><a href="#">Для коллег</a></li>
                                <li><a href="#">Для родителей</a></li>
                                <li><a href="#">Любимой</a></li>
                                <li><a href="#">Любимому</a></li>
                                <li><a href="#">Партнеру по бизнесу</a></li>
                                <li><a href="#">Ребенку</a></li>
                                <li><a href="#">Спасибо</a></li>
                                <li><a href="#">Извини</a></li>
                                <li><a href="#">Экстрим</a></li>
                                <li><a href="#">Учителю</a></li>
                                <li><a href="#">На день рождения</a></li>
                                <li><a href="#">На праздник</a></li>
                                <li><a href="#">Прикол</a></li>
                                <li><a href="#">На рождение ребенка</a></li>
-->
                            </ul>
                        </div>
                        <div class="widgets_inner" >
                            <h4>Какой повод:</h4>
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
                                    <label for="amount">РАЗРАБОТАТЬ </label>
                                    <input type="text" id="amount" readonly>
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

<!--================Most Product Area =================
<section class="most_product_area most_p_withoutbox">
    <div class="container">
        <div class="main_title">
            <h2>Most Searched Products</h2>
            <p>Who are in extremely love with eco friendly system.</p>
        </div>
        <div class="row most_product_inner">
            <div class="col-lg-3 col-sm-6">
                <?php foreach ($items as $item): ?>
                <div class="most_p_list">
                    <div class="media">
                        <div class="d-flex">
                            <img src="/img/product/most-product/m-product-1.jpg" alt="">
                        </div>
                        <div class="media-body">
                            <a href="#">
                                <h4>
                                    <?= $item->name ?>
                                </h4>
                            </a>
                            <h3>$189.00</h3>
                        </div>
                    </div>

                </div>
                <?php endforeach ?>
            </div>

        </div>
    </div>
</section>
--================End Most Product Area =================-->
