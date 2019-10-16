<?php
/**
 * @var \yii\web\View $this
 * @var \app\models\Events[] $events
 */
?>

<div class="footer-container"><!-- Begin Footer -->
    <div class="container">
        <div class="row footer-row">
            <div class="span3 footer-col">
                <h5>Про нас</h5>
                <img src="/img/logo-white.png" alt="Ki-Aikido"/><br/><br/>
                <address>
                    <strong><?= Yii::$app->params['appName'];?></strong>
                    <br/>
                    <?= Yii::$app->params['address']; ?>
                    <br/>
                </address>
                <ul class="social-icons">
                    <li>
                        <a href="https://www.facebook.com/people/%D0%92%D0%B8%D1%82%D0%B0%D0%BB%D0%B8%D0%B9-%D0%91%D0%B5%D0%BB%D0%B5%D0%BD%D0%BA%D0%BE/100006671461777" class="social-icon facebook" target="_blank"></a>
                    </li>
                    <li><a href="#" class="social-icon twitter"></a></li>
                    <li><a href="#" class="social-icon dribble"></a></li>
                    <li><a href="#" class="social-icon rss"></a></li>
                    <li><a href="#" class="social-icon forrst"></a></li>
                </ul>
            </div>
            <div class="span3 footer-col">
                <h5>Розклад тренувань:</h5>
                <ul>
                    <?php foreach (Yii::$app->params['schedule'] as $days => $times): ?>
                        <a href="#"><?= $days; ?></a>
                        <?php foreach ($times as $time): ?>
                            <li>
                                <?= $time; ?>
                            </li>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="span3 footer-col">
                <h5>Найближчі події:</h5>
                <ul class="post-list">
                    <?php if (!empty($events)):?>
                        <?php foreach ($events as $event):?>
                        <li>
                            <a href="<?= \yii\helpers\Url::to(['events/view', 'slug' => $event->slug])?>"><?= $event->title;?></a>
                            <span><?= date('d-m-Y', strtotime($event->date));?></span>
                        </li>
                        <?php endforeach;?>
                    <?php else:?>
                        <li>
                            Подій немає.
                        </li>
                    <?php endif;?>
                </ul>
            </div>
        </div>

        <div class="row"><!-- Begin Sub Footer -->
            <div class="span12 footer-col footer-sub">
                <div class="row no-margin">
                    <div class="span6">
                        <span class="left">© <?= date('Y') ?> Ki-Aikido. All rights reserved.</span>
                    </div>
                    <div class="span6">
                            <span class="right">
                                <?php foreach (\app\widgets\Header::getLinks() as $link): ?>
                                    <a href="<?= \yii\helpers\Url::to($link['url']); ?>">
                                        <?= $link['label']; ?>
                                    </a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                                <?php endforeach; ?>
                            </span>
                    </div>
                </div>
            </div>
        </div><!-- End Sub Footer -->

    </div>
</div><!-- End Footer -->

<!-- Scroll to Top -->
<div id="toTop">Back to Top</div>
