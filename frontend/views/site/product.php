<?php 

use yii\helpers\Url;
use yii\helpers\Html;

?>

        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
				<div class="container">
					<div class="banner_content text-center">
						<h2>Описание продукта</h2>
						<div class="page_link">
                        <a href="<?= url::toRoute(['site/index']) ?>">Главная</a>
							<a href="<?= url::toRoute(['site/category']) ?>">Категории</a>
							<a href="#">Описание продукта</a>
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Single Product Area =================-->
        <div class="product_image_area">
        	<div class="container">
        		<div class="row s_product_inner">
        			<div class="col-lg-6">
        				<div class="s_product_img">
							<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
								<ol class="carousel-indicators">
                                <?php $i=0 ?>
                                <?php foreach($product->images as $image): ?>
                                <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i ?>" class="active">
                                    <img src="<?= $image->path ?>" alt="" style="width: 60px">
									</li>
                                <?php $i++ ?>
                                <?php endforeach ?>
								</ol>
								<div class="carousel-inner">
                                    <?php $i=0 ?>
                                    <?php foreach ($product->images as $image): ?>
                                    <div class="carousel-item <?php if ($i === 0) echo "active" ?>">
                                    <img class="d-block w-100" src="<?= $image->path ?>" alt="<?= $image->alt ?>">
									</div>
                                    <?php $i++ ?>
                                    <?php endforeach ?>
								</div>
							</div>
        				</div>
        			</div>
        			<div class="col-lg-5 offset-lg-1">
        				<div class="s_product_text">
                        <h3><?= $product->name ?></h3>
                        <h2><?= $product->getActualPrice() ?></h2>
                        <p><?= $product->short_description ?></p>
        					<div class="card_area">
                                <form action="/site/checkout" method="get">
                                <?php echo Html :: hiddenInput(\Yii :: $app->getRequest()->csrfParam, \Yii :: $app->getRequest()->getCsrfToken(), []); ?>
                                    <input type="hidden" name="product" id="" value="<?= $product->cpu ?>" />
                                    <input class="main_btn" type="submit" name="Завернуть" id="" value="Завернуть" />
                                <a class="icon_btn" href="#"><i class="lnr lnr lnr-heart"></i></a>
                                </form>
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
        <!--================End Single Product Area =================-->
        
        <!--================Product Description Area =================-->
        <section class="product_description_area">
        	<div class="container">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item">
					<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Описание</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Условия</a>
					</li>
					<li class="nav-item">
					<a class="nav-link " id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Отзывы</a>
					</li>
				</ul>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <?= $product->description ?>
					</div>
					<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        Блок находится в разработке.
					</div> <!-- description -->
					<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
					</div>
					<div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                        <p> Извините, блок находится в разработке. </p>
					</div> <!-- review block -->
				</div>
        	</div>
        </section>
        <!--================End Product Description Area =================-->
