<?php
namespace app\widgets;

use app\models\Events;
use yii\base\Widget;

/**
 * Class Footer
 * @package app\widgets
 */
class Footer extends Widget
{
    /**
     * @return string
     */
    public function run(){
        return $this->render('footer', [
            'events' => $this->getFutureEvents()
        ]);
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getFutureEvents(){
        return Events::find()
            ->where('date > NOW() AND enabled = true')
            ->orderBy('date DESC')
            ->limit(5)->all();
    }
}