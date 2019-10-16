<?php
/**
 * @var \yii\web\View $this
 */
use \yii\helpers\Url;
use \yii\helpers\Html;
use \yii\bootstrap\Nav;
?>

<div class="row header"><!-- Begin Header -->

    <!-- Logo
    ================================================== -->
    <div class="span5 logo">
        <a href="<?= Url::home();?>"><img src="/img/logo-black.png" alt="Ki-Aikido logo" /></a>
        <h5> 心身統一合氣道 </h5>
    </div>

    <div class="span7 navigation">
        <div class="navbar hidden-phone">

            <?= Nav::widget([
                'items' => \app\widgets\Header::getLinks(),
                'options' => ['class' => 'nav-pills'],
            ]);?>

        </div>

        <!-- Mobile Nav
        ================================================== -->
        <form action="#" id="mobile-nav" class="visible-phone">
            <div class="mobile-nav-select">
                <select onchange="window.open(this.options[this.selectedIndex].value,'_top')">
                   <?php foreach ($this->context->getLinks() as $link):?>
                       <?= Html::tag('option', $link['label'], [
                           'value' => Url::to($link['url']),
                           'selected' => Url::to() == Url::to($link['url']),
                       ]); ?>
                    <?php endforeach;?>
                </select>
            </div>
        </form>

    </div>

</div>
