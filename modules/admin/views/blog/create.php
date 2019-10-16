<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BlogItems */

$this->title = Yii::t('app', 'Новий запис');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Блог'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-items-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
