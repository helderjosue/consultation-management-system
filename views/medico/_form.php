<?php

use app\models\Area;
use app\models\Tipo;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Medico */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="medico-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'sexo')->dropDownList([ 'M' => 'M', 'F' => 'F', ], ['prompt' => 'Escolha um genero']) ?>

        <?= $form->field($model, 'idade')->textInput(['type' => 'number']) ?>

        <?= $form->field($model, 'telefone')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'tipo_id')->dropDownList(
            ArrayHelper::map(Tipo::find()->all(), 'id', 'nome'),  ['prompt' => 'Escolha um tipo'] ) ?>

        <?= $form->field($model, 'area_id')->dropDownList(
            ArrayHelper::map(Area::find()->all(), 'id', 'nome_area'),  ['prompt' => 'Escolha uma área'] ) ?>

        <?= $form->field($model, 'created_at')->hiddenInput(['value'=>date('Y-m-d H:i:s')])->label(false) ?>

        <?= $form->field($model, 'created_by')->hiddenInput(['value'=>Yii::$app->user->identity->id])->label(false) ?>

        <?= $form->field($model, 'updated_at')->hiddenInput()->label(false) ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success btn-flat float-right rounded']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
