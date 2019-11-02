<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RedirectRoutes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="redirect-routes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'from_route')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'to_route')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'enabled')->widget(\kartik\widgets\SwitchInput::classname(), []); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
