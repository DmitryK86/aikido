<?php
namespace app\controllers;


use app\models\BlogItems;
use yii\web\Controller;
use yii\web\HttpException;

class BlogController extends Controller
{
    public function actionView($slug){
        $blogItem = BlogItems::findOne(['slug' => $slug]);
        if (!$blogItem){
            throw new HttpException(404, 'Not found');
        }

        return $this->render('view', ['blogItem' => $blogItem]);
    }
}