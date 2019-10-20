<?php
/**
 * @var \yii\web\View $this
 */

$this->title = Yii::t('app', 'Тренер');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row coach-row" style="display: flex;">

    <!-- Blog Posts
    ================================================== -->
    <div class="span8 blog">

        <article>
            <h3 class="title-bg"><a href="#"><?= Yii::t('app', 'Тренер');?></a></h3>
            <div class="post-summary">
                <a href="https://we.graphics/demo/piccolo/blog-single.htm">
                    <img src="/img/coach.jpg" alt="Coach">
                </a>
            </div>
        </article>

    </div>

    <!-- Blog Sidebar
    ================================================== -->
    <div class="span4 sidebar">

        <div>
            <h4>Віталій Беленко</h4>
        </div>

        <div>
            <h4>2-й дан Кі-Айкідо (чорний пояс)</h4>
            <h5 style="margin: 0">офіційний екзаменатор та помічник ректора</h5>
        </div>

    </div>

</div>

