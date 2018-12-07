<?php 
    use yii\helpers\Url;
    use yii\helpers\Html;

    $city = $this->params['city'];
    $fcid = $this->params['fcid'];
    $scid = -99;

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
<script>
    var initialFcidFromBackend =  <?= $fcid ?>; 
    var initialCityFromBackend = <?= $city->id?>;
    var globalPage = 'category';
</script>
<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content text-center">
                <h2>Оригинальные подарки в г. <?= $city->name ?></h2>
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
                        <select class="sorting" style="display: none;">
                            <option value="1">Default sorting</option>
                            <option value="2">Default sorting 01</option>
                            <option value="4">Default sorting 02</option>
                        </select><div class="nice-select sorting" tabindex="0"><span class="current">Default sorting</span><ul class="list"><li data-value="1" class="option selected">Default sorting</li><li data-value="2" class="option">Default sorting 01</li><li data-value="4" class="option">Default sorting 02</li></ul></div>
                        <select class="show" style="display: none;">
                            <option value="1">Show 12</option>
                            <option value="2">Show 14</option>
                            <option value="4">Show 16</option>
                        </select><div class="nice-select show" tabindex="0"><span class="current">Show 12</span><ul class="list"><li data-value="1" class="option selected">Show 12</li><li data-value="2" class="option">Show 14</li><li data-value="4" class="option">Show 16</li></ul></div>
                    </div>
                    <div class="right_page ml-auto">
                        <nav class="cat_page" aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item blank"><a class="page-link" href="#">...</a></li>
                                <li class="page-item"><a class="page-link" href="#">6</a></li>
                                <li class="page-item"><a class="page-link" href="#"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
                            </ul>
                        </nav>
                    </div>
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
                            <li><a <?php if ($fcid == -99) echo "class=\"accented\""?> href="" data-fcatid = '-99'>Все</a></li>
                                <?php foreach ($fcats as $fcat): ?>
                                    <li> <a <?php if ($fcid == $fcat->id) echo "class=\"accented\""?> href="" data-fcatid = '<?= $fcat->id ?>'><?= $fcat->name ?></a></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                        <div class="widgets_inner" >
                            <h4>Стиль подарка:</h4>
                            <!--  вывести сюда все подарки -->
                            <ul class="list" id='scatlist'>
                            <li><a <?php if ($scid == -99) echo "class=\"accented\""?> href="#" data-scatid = '-99'>Все</a></li>
                            <?php foreach ($scats as $scat): ?>
                                <li ><a <?php if ($scid == $scat->id) echo "class=\"accented\""?> href="#" data-scatid = '<?= $scat->id ?>'><?= $scat->name ?></a></li>
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

