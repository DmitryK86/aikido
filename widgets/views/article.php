<?php
/**
 * @var \yii\web\View $this
 * @var \app\models\Articles $article
 */

use \yii\helpers\Url;
use yii\helpers\StringHelper;
?>

<li class="span4 gallery-item">
    <a class="my-index-link" href="<?= Url::to(['/articles/view', 'slug' => $article->slug]); ?>" title="Читати статтю">
        <img class="my-article-image" src="<?= $article->getImageSrc() ?>" alt="picture">
    </a>
    <span class="project-details">
        <a href="<?= Url::to(['/articles/view', 'slug' => $article->slug]); ?>">
           <?= $article->title; ?>
        </a>
        <?= StringHelper::truncate($article->subtitle,115); ?>
    </span>
</li>
