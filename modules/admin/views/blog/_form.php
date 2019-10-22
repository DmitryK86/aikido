<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\SwitchInput;
use kartik\widgets\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\BlogItems */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blog-items-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_at')->widget(DateTimePicker::className()) ?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <?= $form->field($model, 'enabled')->widget(SwitchInput::classname(), []) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Зберегти'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
