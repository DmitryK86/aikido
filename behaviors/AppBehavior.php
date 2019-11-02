<?php
namespace app\behaviors;


use app\managers\RedirectRoutesManager;
use yii\base\Behavior;
use yii\base\Event;
use yii\web\Application;

class AppBehavior extends Behavior
{
    public function events()
    {
        return [
            Application::EVENT_BEFORE_REQUEST => "onBeforeRequest",
        ];
    }

    public function onBeforeRequest(Event $event){
        (new RedirectRoutesManager())->checkAndREdirect();
    }
}