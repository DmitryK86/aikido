<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\forms\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Контакти';
$this->params['breadcrumbs'][] = $this->title;
\app\assets\LightboxAsset::register($this);
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            <?= Yii::t('app', 'Дякуємо за Ваше питання. Ми відповімо на нього як найшвидше.');?>
        </div>

    <?php else: ?>

        <p>
            <?= Yii::t('app', 'Якщо у Вас є питання або зауваження, заповніть форму нижче. Дякуємо Вам!');?>
        </p>

        <div class="row flex-row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'subject') ?>

                    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Відправити', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>

            <div class="col-lg-5">
                <div class="span4 sidebar page-sidebar"><!-- Begin sidebar column -->
                    <h5 class="title-bg" style="margin-top: 0px;">
                        <?= Yii::t('app', 'Наше місцезнаходження');?>
                    </h5>
                    <address>
                        <strong><?= Yii::$app->params['appName'];?></strong><br>
                        <?= Yii::$app->params['address']; ?><br>
                        <abbr title="Phone"><?= Yii::t('app', 'Телефони');?>:<br></abbr>
                        <?= implode('<br>', Yii::$app->params['phones']);?>
                    </address>

                    <address>
                        <strong>E-mail</strong><br>
                        <a href="mailto:#"><?= Yii::$app->params['adminEmail'];?></a>
                    </address>

                    <h5 class="title-bg"><?= Yii::t('app', 'Ми на карті');?></h5>
                    <a data-fancybox="gallery" href="/img/map.png">
                        <img src="/img/map.png" alt="map">
                    </a>

                </div>
            </div>
        </div>

    <?php endif; ?>
</div>
