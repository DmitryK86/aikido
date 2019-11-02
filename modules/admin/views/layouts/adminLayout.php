<?php
/* @var $this \yii\web\View */

/* @var $content string */

use \yii\helpers\Url;
use \kartik\widgets\SideNav;

?>

<?php $this->beginContent('@app/views/layouts/main.php'); ?>

    <div class="wrap">
        <div class="col-md-2">
            <?php if (!Yii::$app->user->isGuest): ?>
                <?= SideNav::widget([
                    'items' => [
                        [
                            'label' => Yii::t('app', 'Події'),
                            'icon' => 'time',
                            'items' => [
                                ['label' => Yii::t('app', 'Дивитися'), 'url' => Url::to(['/admin/events/index/'])],
                                ['label' => Yii::t('app', 'Створити'), 'url' => Url::to(['/admin/events/create/'])],
                            ],
                        ],
                        [
                            'label' => 'Статті',
                            'icon' => 'list-alt',
                            'items' => [
                                ['label' => Yii::t('app', 'Дивитися'), 'url' => Url::to(['/admin/articles/index/'])],
                                ['label' => Yii::t('app', 'Створити'), 'url' => Url::to(['/admin/articles/create/'])],
                            ],
                        ],
                        [
                            'label' => 'Блог',
                            'icon' => 'book',
                            'items' => [
                                ['label' => Yii::t('app', 'Дивитися записи'), 'url' => Url::to(['/admin/blog/index'])],
                                ['label' => Yii::t('app', 'Створити запис'), 'url' => Url::to(['/admin/blog/create'])],
                            ],
                        ],
                        [
                            'label' => 'Галерея',
                            'icon' => 'picture',
                            'items' => [
                                ['label' => Yii::t('app', 'Дивитися'), 'url' => Url::to(['/admin/gallery/index'])],
                                ['label' => Yii::t('app', 'Створити'), 'url' => Url::to(['/admin/gallery/create'])],
                            ],
                        ],
                        [
                            'label' => 'Redirects',
                            'icon' => 'random',
                            'items' => [
                                ['label' => Yii::t('app', 'Дивитися'), 'url' => Url::to(['/admin/redirect-routes/index'])],
                                ['label' => Yii::t('app', 'Створити'), 'url' => Url::to(['/admin/redirect-routes/create'])],
                            ],
                        ],
                    ]
                ]); ?>
            <?php endif; ?>
        </div>
        <div class="col-md-9">
            <?= $content; ?>
        </div>
    </div>

<?php $this->endContent();
