<?php 
    use yii\helpers\Url;
    use yii\helpers\Html;

?> 

<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content text-center">
                <h2>Отложенные</h2>
                <div class="page_link">
                    <a href="/">Главная</a>
                    <a href="#">Отложенные</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Cart Area =================-->
<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Название</th>
                            <th scope="col">Описание</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($favs as $fav): ?>
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="d-flex">
                                    <img src="<?= $fav->items->getMainImage() ?>" alt="" style="height: 150px;">
                                    </div>
                                    <div class="media-body">
                                    <p><?= $fav->items->name ?></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                    <p><?= $fav->items->short_description ?></p>
                            </td>

                            <td>
                                <form action="/site/del-one-fav" method="post">
                                    <?php echo Html::hiddenInput(\Yii::$app->getRequest()->csrfParam, \Yii :: $app->getRequest()->getCsrfToken(), []); ?>
                                    <input type="hidden" name="iid" id="" value="<?= $fav->items->id ?>" />
                                    <input class="main_btn" type="submit" name="" id="" value="удалить" />
                                </form>
                            </td>
                            <td>
                                <form action="/site/checkout" method="get">
                                    <input type="hidden" name="product" id="" value="<?= $fav->items->cpu ?>" />
                                    <input class="main_btn" type="submit" name="" id="" value="Оформить" />
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>

                        <tr class="bottom_button">
                            <td>
                            </td>
                            <td>
                                
                            </td>
                            <td>
                                
                            </td>
                            <td>

                                <div class="cupon_text">
                                    <form action="/site/del-all-fav" method="post">
                                        <?php echo Html::hiddenInput(\Yii::$app->getRequest()->csrfParam, \Yii :: $app->getRequest()->getCsrfToken(), []); ?>
                                        <input class="main_btn" type="submit" name="" id="" value="Очистить" />
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!--================End Cart Area =================-->
