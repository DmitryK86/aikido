<?php
namespace app\widgets;


use app\models\Articles;
use yii\base\Widget;

/**
 * Class Article
 * @package app\widgets
 *
 * @property Articles $article
 */
class Article extends Widget
{
    public $article;

    public function run()
    {
        if (!$this->article){
            return;
        }

        return $this->render('article', ['article' => $this->article]);
    }

}