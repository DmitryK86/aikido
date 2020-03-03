<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
$this->registerCssFile("@web/css/style-ie.css",
    ['rel' => 'stylesheet',
        'noscript' => true,
        'condition' => 'lt IE',
        'depends' => [AppAsset::className()]],
    'mystyle');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html xmlns="https://www.w3.org/1999/xhtml" lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) . Yii::t('app', ' | Українська спільнота Кі - Айкідо, розвиток єдності свідомості і тіла') ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>

    <link rel="shortcut icon" href="/favicon.ico">
    <?php $this->head() ?>
</head>

<body class="home">
<?php $this->beginBody() ?>

    <div class="container">
       <?= \app\widgets\Header::widget();?>
       <div class="breadcrumbs-custom">
           <?= Breadcrumbs::widget([
               'homeLink' => ['label' => 'Головна', 'url' => \yii\helpers\Url::home()],
               'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
           ]) ?>
       </div>

       <?= $content ?>
    </div>

<?= \app\widgets\Footer::widget();?>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
