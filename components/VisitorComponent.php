<?php
namespace app\components;

use app\models\Visits;
use Jaybizzle\CrawlerDetect\CrawlerDetect;
use yii\web\Cookie;

class VisitorComponent
{
    const VISITOR = '_visitor';
    const VISITOR_ADMIN = '_visitor_admin';
    const VISITOR_TODAY = '_visitor_today';

    public static function isNewVisitor(){
        return !isset(\Yii::$app->request->cookies[self::VISITOR]);
    }

    public static function isNewVisitorToday(){
        $cookies = \Yii::$app->request->cookies;
        return !($cookies->has(self::VISITOR_TODAY) || $cookies->has(self::VISITOR_ADMIN));
    }

    public static function updateVisitsCounters(){
        $visit = Visits::find()->where(['date' => date('Y-m-d')])->one();

        if (!$visit){
            $visit = new Visits();
            $visit->date = date('Y-m-d');
            $visit->save();
        }
        else{
            $visit->updateCounters(['visits' => 1]);
        }

        self::setCookie(self::VISITOR_TODAY, 1, strtotime('tomorrow'));
    }

    public static function checkIsBot(){
        $crawlerDetector = new CrawlerDetect();
        return $crawlerDetector->isCrawler();
    }

    public static function setCookie($name, $value, $expired = null){
        $cookies = \Yii::$app->response->cookies;

        $cookies->add(new Cookie([
            'name' => $name,
            'value' => $value,
            'expire' => $expired ?: time() + 60*60*24*365,
        ]));
    }

    public static function getChartData($daysLimit = 14){
        $visits = Visits::find()->orderBy('id desc')->limit($daysLimit)->all();
        $days = [];
        $visitorsCount = [0];

        foreach ($visits as $visitDay){
            $days[] = $visitDay->date;
            $visitorsCount[] = $visitDay->visits;
        }

        return [
            'days' => array_reverse($days),
            'visits' => array_reverse($visitorsCount)
        ];
    }
}