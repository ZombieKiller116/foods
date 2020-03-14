<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HomeAsset extends AssetBundle
{

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
//        'js/jquery.min.js',
        'js/jquery-migrate-3.0.1.min.js',
        'js/popper.min.js',
        'js/bootstrap.min.js',
        'js/jquery.easing.1.3.js',
        'js/jquery.waypoints.min.js',
        'js/jquery.stellar.min.js',
        'js/owl.carousel.min.js',
        'js/jquery.magnific-popup.min.js',
        'js/jquery.animateNumber.min.js',
        'js/scrollax.min.js',
        'https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false',
        'js/google-map.js',
        'js/aos.js',
        'js/main.js',

    ];
    public $css = [
        'https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,900',
        'https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i',
        'css/open-iconic-bootstrap.min.css',
        'css/animate.css',
        'css/owl.carousel.min.css',
        'css/owl.theme.default.min.css',
        'css/magnific-popup.css',
        'css/ionicons.min.css',
        'css/flaticon.css',
        'css/icomoon.css',
        'css/aos.css',
        'css/style.css',


    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
?>

