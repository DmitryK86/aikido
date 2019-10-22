<?php

use yii\helpers\Url;
/**
 * @var  \yii\web\View $this
 * @var \app\models\BlogItems[] $items
 */
?>

<div class="span6">

    <h5 class="title-bg">Блог
        <small>останні публікації</small>
        <button id="btn-blog-next" class="btn btn-inverse btn-mini" type="button">&raquo;</button>
        <button id="btn-blog-prev" class="btn btn-inverse btn-mini" type="button">&laquo;</button>
    </h5>

    <div id="blogCarousel" class="carousel slide ">

        <!-- Carousel items -->
        <div class="carousel-inner">

            <?php foreach ($items as $i => $item):?>
                <div class="item <?= $i === 0 ? 'active' : null;?>">
                    <a href="<?= Url::to(['/blog/view', 'slug' => $item->slug])?>">
                        <img src="<?= $item->getImageSrc();?>" alt="" class="align-left blog-thumb-preview max-height-220" />
                    </a>
                    <div class="post-info clearfix">
                        <h4>
                            <a href="<?= Url::to(['/blog/view', 'slug' => $item->slug])?>">
                               <?= $item->title;?>
                            </a>
                        </h4>
                        <ul class="blog-details-preview">
                            <li><i class="icon-calendar"></i><strong>Коли створена:</strong> <?= date('d/m/Y', strtotime($item->created_at));?><li>
                            <li><i class="icon-user"></i><strong>Ким створена:</strong> <a href="#" title="Link">Адміністратор</a><li>
                        </ul>
                    </div>
                    <p class="blog-summary">
                        <?= \yii\helpers\StringHelper::truncate($item->text, 200);?>
                    </p>
                </div>
            <?php endforeach;?>

        </div>
    </div>
</div>
