<?php
namespace app\controllers;

use app\models\Events;
use yii\web\Controller;
use yii\web\HttpException;

/**
 * Class EventsController
 * @package app\controllers
 */
class EventsController extends Controller
{
    public function actionIndex(){
        $events = Events::findAll(['enabled' => true]);

        return $this->render('index', ['events' => $events]);
    }

    public function actionView($slug){
        $event = Events::findOne(['slug' => $slug]);
        if (!$event){
            throw new HttpException(404, 'Not found');
        }

        return $this->render('view', ['model' => $event]);
    }
}