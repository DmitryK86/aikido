<?php
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 10.02.20
 * Time: 22:14
 */

namespace app\assets;


use yii\web\AssetBundle;

class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot/adminAsset';
    public $baseUrl = '@web/adminAsset';

    public $css = [

    ];
    public $js = [
        'js/admin.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}