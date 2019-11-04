<?php
namespace app\widgets;

use yii\base\Widget;
use yii\helpers\Url;

/**
 * Class Header
 * @package app\widgets
 */
class Header extends Widget
{
    public function run()
    {
        return $this->render('header');
    }

    public static function getLinks(){
        return [
            [
                'label' => 'Головна',
                'url' => ['/site/index'],
                'active' => self::checkIsActive(''),
            ],
            [
                'label' => 'Події',
                'url' => ['/events'],
                'active' => self::checkIsActive('events'),
            ],
            [
                'label' => 'Галерея',
                'url' => ['/gallery'],
                'active' => self::checkIsActive('gallery'),
            ],
            [
                'label' => 'Статті',
                'url' => ['/articles'],
                'active' => self::checkIsActive('articles'),
            ],
            [
                'label' => 'Тренер',
                'url' => ['/site/coach'],
                'active' => self::checkIsActive('coach'),
            ],
            [
                'label' => 'Контакти',
                'url' => ['/site/contact'],
                'active' => self::checkIsActive('contact'),
            ],
            [
                'label' => 'Вихід',
                'url' => ['/admin/logout/'],
                'visible' => !\Yii::$app->user->isGuest,
            ],
        ];
    }

    private static function checkIsActive($route){
        return strcasecmp(trim(\Yii::$app->request->getPathInfo(), '/'), $route) === 0;
    }
}