<?php
namespace app\behaviors;

use app\components\VisitorComponent;
use app\managers\RedirectRoutesManager;
use yii\base\Behavior;
use yii\base\Event;
use yii\web\Application;
use yii\web\Controller;

/**
 * Class AccessBehavior
 * @package app\components\behaviors
 */
class AppBehavior extends Behavior
{
    public function events()
    {
        return [
            Controller::EVENT_BEFORE_ACTION => 'beforeAction',
            Controller::EVENT_AFTER_ACTION => 'afterAction',
            Application::EVENT_BEFORE_REQUEST => "onBeforeRequest",
        ];
    }

    public function beforeAction(){
        if (VisitorComponent::isNewVisitorToday() && !VisitorComponent::checkIsBot()){
            VisitorComponent::updateVisitsCounters();
        }
    }

    public function afterAction(){
        return true;
    }

    public function onBeforeRequest(Event $event){
        (new RedirectRoutesManager())->checkAndREdirect();
    }
}