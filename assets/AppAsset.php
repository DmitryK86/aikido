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
class AppAsset extends AssetBundle
{
    const STATIC_VERSION = 1;

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.css',
        'css/bootstrap-responsive.css',
        'css/custom-styles.css',
        'css/flexslider.css',
        'css/prettyPhoto.css',
        'css/custom.css'
    ];
    public $js = [
        'js/admin.js',
        'js/bootstrap.js',
        'js/jquery.custom.js',
        'js/jquery.flexslider.js',
        'js/jquery.prettyPhoto.js',
        'js/html5shiv.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    public function init()
    {
        parent::init();

        $this->css = $this->addVersion($this->css);
        $this->js = $this->addVersion($this->js);
    }

    private function addVersion(array $sources){
        $_s = [];
        foreach ($sources as $source){
            $_s[] = $source . '?v=' . self::STATIC_VERSION;
        }

        return $_s;
    }
}
