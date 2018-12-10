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
        "/css/bootstrap.css",
        "/vendors/linericon/style.css",
        "/css/font-awesome.min.css",
        "/vendors/owl-carousel/owl.carousel.min.css",
        "/vendors/lightbox/simpleLightbox.css",
        "/vendors/nice-select/css/nice-select.css",
        "/vendors/animate-css/animate.css",
        "/vendors/jquery-ui/jquery-ui.css", 
        "/css/style.css",
        "/css/responsive.css",
    ];
    public $js = [

        "/js/jquery-3.2.1.min.js",
        "/js/popper.js",
        "/js/bootstrap.min.js",
        "/js/stellar.js",
        "/vendors/lightbox/simpleLightbox.min.js",
        "/vendors/nice-select/js/jquery.nice-select.min.js",
        "/vendors/isotope/imagesloaded.pkgd.min.js",
        "/vendors/isotope/isotope-min.js",
        "/vendors/owl-carousel/owl.carousel.min.js",
        "/js/jquery.ajaxchimp.min.js",
        "vendors/jquery-ui/jquery-ui.js",
        "/vendors/counter-up/jquery.waypoints.min.js",
//        "/vendors/flipclock/timer.js",
       "/vendors/counter-up/jquery.counterup.js",
        "/js/mail-script.js",
        "/js/theme.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
        /* 'yii\bootstrap\BootstrapPluginAsset', */
        /* '\rmrevin\yii\fontawesome\AssetBundle' */
    ];
}
