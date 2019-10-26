<?php
/**
 * @var \yii\web\View $this
 */
?>

<div class="admin-default-index">
    <h1>Управління сайтом</h1>
</div>

<table class="table">
    <thead>
    <tr>
        <th colspan="2">Дані про систему</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Версія CMS</td>
        <td><span class="label label-default"><?php echo Yii::$app->version; ?></span></td>
    </tr>
    <tr>
        <td>Версія Yii</td>
        <td><span class="label label-default"><?php echo Yii::getVersion(); ?></span></td>
    </tr>
    <tr>
        <td>Версія PHP</td>
        <td><span class="label label-default"><?php echo phpversion(); ?></span></td>
    </tr>
    </tbody>
</table>
