<?php

/* @var $this yii\web\View */
/* @var $articles \app\models\Articles[] */

use yii\helpers\Url;

$this->title = Yii::t('app', 'Головна');
?>

<div class="row headline"><!-- Begin Headline -->

    <!-- Slider Carousel
   ================================================== -->
    <div class="span8">
        <img src="/img/main-image.png" alt="slider" />
    </div>

    <!-- Headline Text
    ================================================== -->
    <div class="span3">
        <h3>Що таке Кі-Айкідо?</h3>
        <p class="lead" style="display: block !important;line-height: 25px;margin-bottom: 5px">
            А Й К I Д О - це мистецтво досягнення внутрішнього миру за допомогою знаходження гармонії душі і тіла.
        </p>
        <p>
            Спосіб зміцнення тіла, досягнення стійкості духу і розвитку розуму.
            ШЛЯХ, за яким йде воїн, вдосконалюючись і духовно, і фізично ... БУДО.
        </p>
            合 (Ай) - означає любов, гармонію.
            <br>
            気 (Кі) - внутрішню, духовну енергію.
            <br>
            道 (До) - шлях.
            <br>
            <br>
        <a href="<?= Url::to(['/articles/main'])?>"><i class="icon-plus-sign"></i>Читати далі</a>
    </div>
</div>

<div class="row gallery-row">

    <div class="span12">
        <h5 class="title-bg">
            <?= Yii::t('app', 'Це цікаво');?>
        </h5>

        <div class="row clearfix no-margin">
            <ul class="gallery-post-grid holder">

                <?php foreach ($articles as $article):?>
                    <?= \app\widgets\Article::widget(['article' => $article]);?>
                <?php endforeach;?>

            </ul>
        </div>
    </div>

</div><!-- End Gallery Row -->

<?= \app\widgets\BlogItems::widget();?>

<script>
    document.addEventListener('DOMContentLoaded', function(){

        $("#btn-blog-next").click(function () {
            $('#blogCarousel').carousel('next')
        });
        $("#btn-blog-prev").click(function () {
            $('#blogCarousel').carousel('prev')
        });

        $("#btn-client-next").click(function () {
            $('#clientCarousel').carousel('next')
        });
        $("#btn-client-prev").click(function () {
            $('#clientCarousel').carousel('prev')
        });

    });

    document.addEventListener('DOMContentLoaded', function(){

        $('.flexslider').flexslider({
            animation: "slide",
            slideshow: true,
            start: function(slider){
                $('body').removeClass('loading');
            }
        });
    });
</script>
