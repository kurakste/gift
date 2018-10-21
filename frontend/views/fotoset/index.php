<?php
/* @var $this yii\web\View */

    $images = $fotoset->getImagesArray();

?>
<style>
    img {
        width: 93%;
    }
    .img_container {
        width: 100%;
        text-align: center;
        padding-top: 30px;
    }
    #text {
        width: 93%;
        text-align: justify;
        margin: 0 auto;
    }
    .albom_img {
        margin-bottom: 15px;

    }
    
</style>
<div class="content">
    <div class='img_container'>
        <div id='text'>
            <?=$fotoset->description ?>
        </div>
        <?php foreach ($images as $image): ?>
        <div class='albom_img'>
            <img src="<?= $image ?>" alt="" />
        </div>
        <?php endforeach ?>
    </div>
</div>

