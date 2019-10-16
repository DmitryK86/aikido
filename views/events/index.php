<?php
use yii\helpers\StringHelper;

/**
 * @var \yii\web\View $this
 * @var \app\models\Events[] $events
 */

$this->title = 'Події';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <?php if (!empty($events)):?>
    <?php foreach ($events as $event):?>
        <div class="span3">
            <img src="<?= $event->getImageSrc();?>" alt="image">
            <h5><?= $event->title;?></h5>
            <p><?= StringHelper::truncate($event->description, 120) ?></p>
            <a href="<?= \yii\helpers\Url::to(['/events/view', 'slug' => $event->slug])?>" class="btn btn-small btn-inverse" type="button">Більше інформації</a>
        </div>
    <?php endforeach;?>
    <?php else:?>
        <h3>Подій немає...</h3>
    <?php endif;?>
</div>
