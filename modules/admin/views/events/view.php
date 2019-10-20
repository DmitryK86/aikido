<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Events;

/* @var $this yii\web\View */
/* @var $model app\models\Events */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Події'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="events-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Оновити'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Видалити'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'slug',
            'title',
            'description:html',
            'date',
            [
                'attribute' => 'enabled',
                'value' => function(Events $model){
                    return $model->enabled ? 'Так' : 'Ні';
                }
            ],
            [
                'attribute' => 'image',
                'value' => function($model){
                    return $model->getImageFileUrl('image', \app\helpers\ImageHelper::EMPTY_IMG_SRC);
                },
                'format' => ['image',['width'=>'100','height'=>'100']],
            ],
        ],
    ]) ?>

</div>
