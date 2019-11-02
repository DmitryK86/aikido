<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\RedirectRoutesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Redirect Routes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="redirect-routes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Redirect Routes'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'from_route',
            'to_route',
            [
                'format' => 'html',
                'attribute' => 'enabled',
                'value' => function (\app\models\RedirectRoutes $model) {
                    return $model->enabled
                        ? '<span class="label label-success">Так</span>'
                        : '<span class="label label-danger">Ні</span>';
                },
                'filter' => ['Ні', 'Так'],
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
