<?php
/**
 * @var \yii\web\View $this
 * @var \app\models\BlogItems $blogItem
 * @var \app\models\BlogItems[] $relatedBlogItems
 */

use yii\helpers\Url;

$this->title = $blogItem->title;
$this->params['breadcrumbs'][] = ['url' => '#', 'label' => 'Блог'];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row"><!--Container row-->

    <!-- Blog Full Post
    ================================================== -->
    <div class="span8 blog">

        <!-- Blog Post 1 -->
        <article>
            <h3 class="title-bg"><?= $blogItem->title;?></h3>
            <div class="post-content">
                <a href="#"><img src="<?= $blogItem->getImageSrc();?>" alt="image" class="blog-item-img"></a>

                <div class="post-body">
                    <?= $blogItem->text;?>
                </div>

                <div class="post-summary-footer">
                    <ul class="post-data">
                        <li><i class="icon-calendar"></i> <?= date('d/m/Y', strtotime($blogItem->created_at));?></li>
                        <li><i class="icon-user"></i>Адміністратор</li>
                    </ul>
                </div>
            </div>
        </article>

    </div><!--Close container row-->

    <!-- Blog Sidebar
    ================================================== -->
    <div class="span3 sidebar">

        <!--Popular Posts-->
        <h5 class="title-bg" style="margin-top: 0">Популярні записи:</h5>
        <ul class="popular-posts">
            <?php foreach ($relatedBlogItems as $relatedBlogItem):?>
            <li>
                <a href="<?= Url::to(['/blog/view', 'slug' => $relatedBlogItem->slug])?>">
                    <img src="<?= $relatedBlogItem->getImageSrc();?>" alt="Blog Image" style="max-height: 150px;">
                </a>
                <h6><?= $relatedBlogItem->title;?></h6>
                <em>
                    <?= Yii::t('app', 'Створена {date}', ['date' => date('d/m/Y', strtotime($relatedBlogItem->created_at))]);?>
                </em>
            </li>
            <?php endforeach;?>
        </ul>

    </div>

</div>
