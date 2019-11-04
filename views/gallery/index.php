<?php
/**
 * @var \yii\web\View $this
 * @var \app\models\Gallery[] $galleries
 */

use yii\helpers\Url;

$this->title = 'Галерея';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row gallery-row">

    <div class="span12">
        <?php if (empty($galleries)):?>
            <div class="my-title-row">
                <h2><?= Yii::t('app', 'Нічого немає...');?></h2>
            </div>
        <?php else:?>

        <div class="row clearfix no-margin">
            <ul class="gallery-post-grid holder">

                <?php foreach ($galleries as $gallery): ?>
                    <li class="span4 gallery-item">
                        <a class="my-index-link" href="<?= Url::to(['/gallery/view', 'slug' => $gallery->slug]); ?>">
                            <img class="my-article-image" src="<?= $gallery->getMainImage()->getImageSrc() ?>" alt="picture">
                        </a>
                        <span class="project-details">
                            <a href="<?= Url::to(['/gallery/view', 'slug' => $gallery->slug]); ?>">
                               <?= $gallery->title; ?>
                            </a>
                        </span>
                    </li>
                <?php endforeach; ?>

            </ul>
        </div>
        <?php endif;?>

    </div>

</div>
