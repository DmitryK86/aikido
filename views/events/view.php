<?php

use yii\helpers\Url;
/**
 * @var \yii\web\View $this
 * @var \app\models\Events $event
 */

$this->title = $event->title;
$this->params['breadcrumbs'][] = ['url' => Url::to(['/events']), 'label' => 'Події'];
$this->params['breadcrumbs'][] = $this->title;

$dateAsTime = strtotime($event->date);
$isPastEvent = $dateAsTime < time();
?>

<div class="row">

    <div class="span12 gallery-single">

        <div class="row">
            <div class="span6">
                <img src="<?= $event->getImageSrc();?>" class="thumbnail" alt="image">
            </div>
            <div class="span6">
                <h2>
                    <?= $event->title;?>
                    <?php if ($isPastEvent):?>
                        <p style="color: red; font-size: 12px">(подія завершилась)</p>
                    <?php endif;?>
                </h2>

                <p><?= $event->description;?></p>

                <ul class="project-info">
                    <li><h6>Дата:</h6><?= date('d/m/Y', $dateAsTime);?></li>
                    <li><h6>Час:</h6><?= date('H:i', $dateAsTime);?></li>
                    <li><h6>Тривалість:</h6><?= $event->period;?></li>
                    <li><h6>Місце проведення:</h6><?= $event->place;?></li>
                </ul>

                <?php if (!$isPastEvent):?>
                <button class="btn btn-inverse pull-left" type="button">
                    Прийняти участь
                </button>
                <?php endif;?>
                <a href="<?= Url::to(['/events']);?>" class="pull-right">
                    <i class="icon-arrow-left"></i>
                    Назад
                </a>
            </div>
        </div>

    </div>

</div>
