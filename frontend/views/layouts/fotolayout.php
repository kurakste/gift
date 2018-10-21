<?php
use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use \frontend\widgets\Phone;
use \frontend\widgets\Copyrights;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<?php $this->beginBody() ?>
        <?= $content ?>

<?php $this->endBody() ?>
<?php $this->endPage() ?>

