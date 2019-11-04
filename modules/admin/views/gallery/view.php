<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Gallery */
/* @var $item app\models\GalleryItems */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Galleries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="gallery-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Оновити'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Видалити'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Ви дійсно хочете видалити галерею "{gallery}"?', [
                      'gallery' => $model->title,
                ]),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'created_at',
            [
                'attribute' => 'enabled',
                'value' => function(\app\models\Gallery $model){
                    return $model->enabled ? 'Так' : 'Ні';
                }
            ],
            [
                'attribute' => 'images',
                'label' => Yii::t('app', 'Кількість фото'),
                'value' => function(\app\models\Gallery $model){
                    return $model->getGalleryItems()->count();
                }
            ],
        ],
    ]) ?>

    <?php \yii\widgets\Pjax::begin();?>
    <ul class="gallery-post-grid holder">

        <?php foreach ($model->getGalleryItems()->all() as $num => $item):?>
            <li class="span4 gallery-item" data-id="id-1" data-type="illustration">
                            <span class="gallery-hover-4col hidden-phone hidden-tablet" style="opacity: 0; display: inline;">
                                <span class="gallery-icons">

                                    <?= Html::a(Yii::t('app', 'Головна'),
                                        ['main', 'galleryId' => $model->id, 'itemId' => $item->id],
                                        [
                                            'class' => $item->is_main ? 'btn' : 'btn btn-primary',
                                            'onclick' => $item->is_main ? 'event.preventDefault()' : null
                                        ]);
                                    ?>
                                    <?= Html::a(Yii::t('app', 'Видалити'),
                                        ['delete-item', 'itemId' => $item->id],
                                        [
                                            'class' => 'btn btn-danger',
                                            'data' => [
                                                'confirm' => Yii::t('app', 'Ви дійсно хочете видалити фото?'),
                                                //'method' => 'post',
                                        ],
                                    ]) ?>

                                </span>
                            </span>
                <a href="#">
                    <image src="<?= $item->getImageSrc();?>" style="border: 3px solid black;"></image>
                </a>
            </li>
        <?php endforeach;?>

    </ul>
</div>

<style>
    .gallery-post-grid {
        display: flex;
        flex-wrap: wrap;
    }
    .gallery-hover-4col {
        width: 89px;
        height: 32px;
    }
    .gallery-icons {
        display: flex;
        height: 32px;
    }
</style>