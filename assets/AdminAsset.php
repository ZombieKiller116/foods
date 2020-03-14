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
class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'admin/assets/bootstrap/css/bootstrap.min.css',
        'admin/assets/font-awesome/4.5.0/css/font-awesome.min.css',
        'admin/assets/ionicons/2.0.1/css/ionicons.min.css',
        'admin/assets/dist/css/AdminLTE.min.css',
        'admin/assets/dist/css/skins/_all-skins.min.css',


    ];
    public $js = [
        'admin/assets/bootstrap/js/bootstrap.min.js',
        'admin/assets/plugins/slimScroll/jquery.slimscroll.min.js',
        'admin/assets/plugins/fastclick/fastclick.js',
        'admin/assets/dist/js/app.min.js',
        'admin/assets/dist/js/demo.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}