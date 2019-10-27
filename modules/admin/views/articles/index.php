<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\ArticlesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Статті');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articles-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Створити'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            'published_at',
            [
                'format' => 'html',
                'attribute' => 'enabled',
                'value' => function (\app\models\Articles $model) {
                    return $model->enabled
                        ? '<span class="label label-success">Так</span>'
                        : '<span class="label label-danger">Ні</span>';
                },
                'filter' => ['Ні', 'Так'],
            ],
            [
                'format' => 'html',
                'attribute' => 'is_main',
                'value' => function (\app\models\Articles $model) {
                    return $model->is_main
                        ? '<span class="label label-success">Так</span>'
                        : '<span class="label label-danger">Ні</span>';
                },
                'filter' => ['Ні', 'Так'],
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
