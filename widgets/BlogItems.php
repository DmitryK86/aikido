<?php
namespace app\widgets;

use yii\base\Widget;
use app\models\BlogItems as ModelBlogItems;

class BlogItems extends Widget
{
    public function run()
    {
        $items = ModelBlogItems::find()
            ->where(['enabled' => true])
            ->orderBy('created_at DESC')
            ->limit(3)
            ->all();
        if (empty($items)){
            return;
        }

        return $this->render('blogItems', ['items' => $items]);
    }
}