<?php
/**
 * @var \yii\web\View $this
 * @var \app\models\Articles $model
 */

use \yii\helpers\Url;

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['url' => Url::to(['/articles']), 'label' => 'Статті'];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="span12">
        <h2><?= $model->title;?></h2>
        <p class="lead">
            <?= $model->subtitle;?>
        </p>

        <div class="row">


            <div>
                <div class="span6 my-margin-right-30">
                    <img style="width: 100%" src="<?= $model->getImageSrc(); ?>" align="left" vspace="5" hspace="5">
                </div>
                <?= $model->text;?>
            </div>



        </div>

    </div>
</div>

