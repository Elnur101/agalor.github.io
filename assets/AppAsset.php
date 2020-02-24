<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "/web/public/css/bootstrap.min.css",
        "/web/public/css/font-awesome.min.css",
        "/web/public/css/owl.carousel.min.css",
        "/web/public/css/owl.carousel.min.css",
        "/web/public/css/owl.theme.default.min.css",
        "/web/public/css/animate.min.css",
        "/web/public/css/rateyo.css",
        "/web/public/css/lightslider.min.css",
        "/web/public/css/flexslider.css",
        "/web/public/css/jquery-ui.min.css",
        "/web/public/css/megamenu.css",
        "/web/public/css/style.css"
       // 'web/css/site.css',
    ];
    public $js = [
         "/web/public/js/modernizr.js",
        "/web/public/js/jquery.min.js",
        "/web/public/js/jquery-ui.js",
        "/web/public/js/popper.js",
      "/web/public/js/bootstrap.min.js",
        "/web/public/js/jquery.counterup.min.js",
        "/web/public/js/jquery.nav.js",
        "/web/public/js/jquery.nicescroll.js",
        "/web/public/js/jquery.rateyo.js",
        "/web/public/js/jquery.scrollUp.min.js",
        "/web/public/js/jquery.sticky.js",
        "/web/public/js/mobile.js",
        "/web/public/js/lightslider.min.js",
        "/web/public/js/owl.carousel.min.js",
        "/web/public/js/circle-progress.min.js",
        "/web/public/js/waypoints.min.js",
        "/web/public/js/simplePlayer.js",
        "/web/public/js/jquery.accordion.js",
        "/web/public/js/jquery.cookie.js",
        "/web/public/js/main.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
