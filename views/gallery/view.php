<?php
/**
 * @var \yii\web\View $this
 * @var \app\models\Gallery $model
 * @var \app\models\GalleryItems $image
 */

use \yii\helpers\Url;

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['url' => Url::to(['/gallery']), 'label' => 'Галерея'];
$this->params['breadcrumbs'][] = $this->title;

\app\assets\LightboxAsset::register($this);
?>

<div class="row">
    <div class="span12">
        <div class="my-title-row">
            <h2><?= $model->title;?></h2>
        </div>

        <div class="row clearfix no-margin">
            <ul class="gallery-post-grid holder">

                <?php foreach ($model->getImages() as $image): ?>
                    <li class="span3 gallery-item">

                        <a class="my-index-link" data-fancybox="gallery" href="<?= $image->getImageSrc() ?>">
                            <img class="my-article-image" src="<?= $image->getImageSrc() ?>" alt="picture">
                        </a>
                        <span class="project-details">
                            <?= $image->comment; ?>
                        </span>
                    </li>
                <?php endforeach; ?>

            </ul>
        </div>

    </div>
</div>

