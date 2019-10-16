<?php
namespace app\assets;


use yii\web\AssetBundle;

class LightboxAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/jquery.fancybox.min.css',
    ];
    public $js = [
        'js/jquery.fancybox.min.js',
    ];
    public $depends = [
        'app\assets\AppAsset',
    ];
}