<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Paciente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paciente-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'sexo')->dropDownList([ 'M' => 'M', 'F' => 'F', ], ['prompt' => '']) ?>

        <?= $form->field($model, 'idade')->textInput(['type' => 'number']) ?>

        <?= $form->field($model, 'endereco')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'telefone')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'profissao')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'created_at')->hiddenInput(['value'=>date('Y-m-d H:i:s')])->label(false) ?>

        <?= $form->field($model, 'created_by')->hiddenInput(['value'=>Yii::$app->user->identity->id])->label(false) ?>

        <?= $form->field($model, 'updated_at')->hiddenInput()->label(false) ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success btn-flat float-right rounded']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
