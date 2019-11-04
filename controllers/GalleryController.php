<?php
namespace app\controllers;


use app\models\Gallery;
use yii\web\Controller;
use yii\web\HttpException;

class GalleryController extends Controller
{
    public function actionIndex(){
        $galleries = Gallery::find()->where(['enabled' => true])->all();

        return $this->render('index', ['galleries' => $galleries]);
    }

    public function actionView($slug)
    {
        $model = Gallery::find()->where(['slug' => $slug, 'enabled' => true])->one();
        if (!$model){
            throw new HttpException(404, 'Not found');
        }

        return $this->render('view', ['model' => $model]);
    }
}