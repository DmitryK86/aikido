<?php
namespace app\managers;

use app\models\RedirectRoutes;
use yii\helpers\Url;

class RedirectRoutesManager
{
    public function checkAndREdirect(){
        $requestedRoute = sprintf('/%s/', trim(\Yii::$app->request->getPathInfo(), '/'));

        $redirectModel = RedirectRoutes::findOne(['from_route' => $requestedRoute]);
        if (!$redirectModel){
            return;
        }

        $scheme = \Yii::$app->request->getIsSecureConnection() ? 'https://' : 'http://';
        $domain = \Yii::$app->request->getHostName();

        $url = $scheme . $domain . $redirectModel->to_route;

        header("HTTP/1.1 301 Moved Permanently");
        header("Location: {$url}");
        exit();
    }
}