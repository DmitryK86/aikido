<?php
namespace app\controllers;


use app\models\BlogItems;
use yii\db\Expression;
use yii\web\Controller;
use yii\web\HttpException;

class BlogController extends Controller
{
    public function actionView($slug){
        $blogItem = BlogItems::findOne(['slug' => $slug]);
        if (!$blogItem){
            throw new HttpException(404, 'Not found');
        }

        $relatedItems = BlogItems::find()->andWhere('id <> :blogId', [':blogId' => $blogItem->id])->orderBy(new Expression('rand()'))->limit(3)->all();

        return $this->render('view', ['blogItem' => $blogItem, 'relatedBlogItems' => $relatedItems]);
    }
}