<?php 
use yii\helpers\Html;
use yii\helpers\Url;

?>
        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
				<div class="container">
					<div class="banner_content text-center">
						<h2>Оплата прошла успешно.</h2>
						<div class="page_link">
							<a href="index.html">Home</a>
							<a href="#">Успешная оплата</a>
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        <section class="contact_area p_120">
            <div class="container">
                <h3> Огромное спасибо, что воспользовались нашим сервисом. </h3>
                <h5><a href="<?= Url::toRoute(['cert/get-by-id', 'certid' => $cert->certid]) ?>">ссылка на сертификат</a></h5>
            </div>
        </section>

