<?php 
    use yii\helpers\Url;
    use yii\helpers\Html;

    $city = $this->params['city'];
    $fcid = $this->params['fcid'];
    $scid = -99;


    $curentcity = $this->params['city'];

    $this->registerJsFile('/js/helper.js');
    $this->registerJsFile('/js/class/layoutclass.js');
    $this->registerJsFile('/js/class/categorypageclass.js');
    $this->registerJsFile('/js/catpage.js');

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
    .banner_content {
        padding-top: 140px;
        }
</style>
<script>
</script>
<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content text-center">
                <h3>МАГАЗИН ОРИГИНАЛЬНЫХ ПОДАРКОВ</h3>
                <h3>г. <?= $city->name ?></h3>
                <div class="page_link">
                    <a href="<?= Url::toRoute(['site/index-city', 'city' => $curentcity->cpu]) ?> ?>">ГЛАВНАЯ</a>
                    <a href="#">КАТЕГОРИИ</a>
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
                        <select class="sorting" style="display: none;" id = 'sort-selector'>
                            <option value="1">Возрастание</option>
                            <option value="2">Убывание</option>
                        </select>
                        <div class="nice-select sorting" tabindex="0">
                            <span class="current">Возрастание</span>
                            <ul class="list">
                                <li data-value="1" class="option selected">Возрастание</li>
                                <li data-value="2" class="option">Убывание</li>
                            </ul>
                        </div>
                        <select class="show" style="display: none;" id = 'iemsOnPage'>
                            <option value="12">12</option>
                            <option value="24">24</option>
                            <option value="48">48</option>
                        </select>
                        <div class="nice-select show" tabindex="0">
                            <span class="current">12</span>
                            <ul class="list">
                                <li data-value="12" class="option selected">12</li>
                                <li data-value="24" class="option">24</li>
                                <li data-value="48" class="option">48</li>
                            </ul>
                        </div>
                    </div>
                    <div class="right_page ml-auto">
                        <nav class="cat_page" aria-label="Page navigation example">
                            <ul class="pagination" id='paginator'>
                            </ul>
                        </nav>
                    </div>
                    </div>
                <div class="latest_product_inner row" id="pcontainer">
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
                                <div id="slider-range" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"><div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 2%; width: 98%;"></div><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 2%;"></span><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;"></span></div>
                                <div class="row m0">
                                    <label for="amount">Price : </label>
                                    <input type="text" id="amount" readonly="">
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

