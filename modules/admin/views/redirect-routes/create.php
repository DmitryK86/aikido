<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RedirectRoutes */

$this->title = Yii::t('app', 'Create Redirect Routes');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Redirect Routes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="redirect-routes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
