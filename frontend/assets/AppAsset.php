<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '/css/site.css',
        '/css/bootstrap.css',
        '/css/vendors/linericon/style.css',
        'css/font-awesome.min.css',
        '/css/vendors/owl-carousel/owl.carousel.min.css',
        '/css/vendors/lightbox/simpleLightbox.css',
        '/css/vendors/nice-select/css/nice-select.css',
        '/css/vendors/animate-css/animate.css',
        '/css/vendors/jquery-ui/jquery-ui.css',
        '/css/style.css',
        '/css/responsive.css'
    ];
    public $js = [
        '/js/up.js',
        '/js/parallax.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        '\rmrevin\yii\fontawesome\AssetBundle'
    ];
}
