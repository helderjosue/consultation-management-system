<?php

use app\models\Area;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Tipo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipo-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'area_id')->dropDownList(
            ArrayHelper::map(Area::find()->all(), 'id', 'nome_area'), ['prompt' => 'Escolha uma area']) ?>

        <?= $form->field($model, 'created_at')->hiddenInput(['value'=>date('Y-m-d H:i:s')])->label(false) ?>

        <?= $form->field($model, 'created_by')->hiddenInput(['value'=>Yii::$app->user->identity->id])->label(false) ?>

        <?= $form->field($model, 'updated_at')->hiddenInput()->label(false) ?>

        <?= $form->field($model, 'numero_consultas_dia')->textInput(['type' => 'number']) ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success btn-flat float-right rounded']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
