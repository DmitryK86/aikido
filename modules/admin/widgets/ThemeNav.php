<?php

namespace app\modules\admin\widgets;

use yii\helpers\Html;

class ThemeNav {
	public static function link($label, $icon = null) {

		$link = null;

		if (!empty($icon))
			$link .= Html::tag('i','',['class'=>$icon]);

		$link .= Html::tag('span',\Yii::t('app', $label), []);

		return $link;

	}
}