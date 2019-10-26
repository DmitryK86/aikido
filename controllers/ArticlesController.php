<?php
namespace app\controllers;


use app\models\Articles;
use yii\web\Controller;
use yii\web\HttpException;

class ArticlesController extends Controller
{
    public function actionIndex(){
        $articles = Articles::find()
            ->where(['enabled' => true])
            ->andWhere('published_at <= NOW()')
            ->orderBy('published_at DESC')->all();
        return $this->render('index', ['articles' => $articles]);
    }

    public function actionView($slug)
    {
        $model = Articles::findOne(['slug' => $slug]);
        if (!$model){
            throw new HttpException(404, 'Not found');
        }

        return $this->render('view', ['model' => $model]);
    }
}