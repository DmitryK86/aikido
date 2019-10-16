<?php
/**
 * @var \yii\web\View $this
 * @var \app\models\Articles $articles
 */

use yii\helpers\Url;

$this->title = 'Статті';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row gallery-row">

    <div class="span12">

        <div class="row clearfix no-margin">
            <ul class="gallery-post-grid holder">

                <?php foreach ($articles as $article):?>
                   <?= \app\widgets\Article::widget(['article' => $article]);?>
                <?php endforeach;?>

            </ul>
        </div>
    </div>

</div>
