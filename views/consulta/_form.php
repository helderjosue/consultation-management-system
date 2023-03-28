<?php

use app\models\Area;
use app\models\Medico;
use app\models\Paciente;
use kartik\datetime\DateTimePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model backend\models\Consulta */
/* @var $form yii\widgets\ActiveForm */
/* @var $paciente backend\models\Paciente */

$areas = ArrayHelper::map(Area::find()->all(), 'id', 'nome_area');
$medicos = ArrayHelper::map(Medico::find()->all(), 'id', 'nome');
$pacientes  = ArrayHelper::map(Paciente::find()->orderBy('created_at', SORT_ASC)->all(),'id','nome');
?>
<div class="consulta-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">
        <div class="box-header with-border">
            <h3 class="box-title">Dados do Paciente</h3>
        </div>

        <!--Section for patient-->
        <?= $form->field($model, 'paciente_id')->widget(Select2::class,
            [
                'data' => $pacientes,
                'language' => 'pt',
                'options' => ['placeholder' => 'Escolha um paciente', 'autocomplete' => 'true'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
        ?>

    </div>

    <div class="box-body table-responsive">
        <div class="box-header with-border">
            <h3 class="box-title">Dados da Consulta</h3>
        </div>
        <br>
        <!--Section for consultation -->


        <?= $form->field($model, 'area_id')->dropDownList($areas,

             [
                 'prompt' => 'Escolha uma área',
                 'onchange'=>'
                        $.get( "'.Url::toRoute('/medico/area').'", { id: $(this).val() } )
                            .done(function( data ) {
                                $( "#'.Html::getInputId($model, 'medico_id').'" ).html( data );
                            }
                        );
                    '
             ] ) ?>

        <?= $form->field($model, 'medico_id')->dropDownList(['prompt' => 'Escolha um médico'] ) ?>

        <?= $form->field($model, 'data_consulta')->widget(DateTimePicker::class,[
            'name' => 'dp_1',
            'options' => ['placeholder' => 'Data e hora da consulta'],
            'type' => DateTimePicker::TYPE_INPUT,
            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-mm-dd hh:ii:ss'

            ]
        ]);
        ?>

        <?= $form->field($model, 'created_at')->hiddenInput(['value'=>date('Y-m-d H:i:s')])->label(false) ?>

        <?= $form->field($model, 'created_by')->hiddenInput(['value'=>Yii::$app->user->identity->id])->label(false) ?>

        <?= $form->field($model, 'updated_at')->hiddenInput()->label(false) ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success btn-flat float-right rounded']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
