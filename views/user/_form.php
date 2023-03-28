<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'auth_key')->hiddenInput()->label(false) ?>

        <?= $form->field($model, 'password_hash')->hiddenInput()->label(false) ?>

        <?= $form->field($model, 'password_reset_token')->hiddenInput()->label(false) ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'status')->hiddenInput()->label(false) ?>

        <?= $form->field($model, 'created_at')->hiddenInput(['value'=>date('Y-m-d H:i:s')])->label(false) ?>

<?= $form->field($model, 'updated_at')->hiddenInput()->label(false) ?>

        <?= $form->field($model, 'verification_token')->textInput(['maxlength' => true]) ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success btn-flat float-right rounded']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
