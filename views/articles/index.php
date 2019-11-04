<?php
/**
 * @var \yii\web\View $this
 * @var \app\models\Articles $articles
 */

use app\widgets\Article;

$this->title = 'Статті';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row gallery-row">

    <div class="span12">

        <div class="row clearfix no-margin">
            <ul class="gallery-post-grid holder my-articles-flex">

                <?php foreach ($articles as $article):?>
                   <?= Article::widget(['article' => $article]);?>
                <?php endforeach;?>

            </ul>
        </div>
    </div>

</div>
