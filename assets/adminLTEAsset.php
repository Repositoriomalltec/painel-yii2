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
class adminLTEAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'adminLTEAssets/bower_components/font-awesome/css/font-awesome.min.css',
        'adminLTEAssets/bower_components/Ionicons/css/ionicons.min.css',
        'adminLTEAssets/dist/css/AdminLTE.min.css',
        'adminLTEAssets/dist/css/skins/skin-blue.min.css',
        'adminLTEAssets/plugins/iCheck/square/blue.css',
    ];
    public $js = [
        //'js/jsc/js_cliente.js',
        'adminLTEAssets/dist/js/adminlte.min.js',
        'adminLTEAssets/plugins/iCheck/icheck.min.js',
        //'adminLTEAssets/bower_components/bootstrap/dist/js/bootstrap.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}

