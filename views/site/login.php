<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \app\models\LoginForm $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
$this->title = 'Entrar';
?>
 
<div style = "margin: auto; width: 50%; padding: 10px; text-align:center;">
<h4 class="text-center"> <strong>Bem Vindo ao <br>
Sistema de Gestão de Agendamento de Consultas Clínicas</strong>
</h4>

Esta é uma aplicação web que foi concebida com o intuíto de ajudar
 as Unidades de Saúde a agendar e gerir marcações de consultas clínicas dos pacientes.
Atualmente a aplicação permite apenas que o agendamento de consultas médicas 
    seja feito à partir da Unidade de Sanitária, mas em versões
 posteriores, o sistema permitirá que o agendamento seja feito remotamente.
</div>
<div class="site-login">
    <div class="mt-2 offset-lg-3 col-lg-6">
        <h1 class="text-center" ><?= Html::encode($this->title) ?></h1>

        <p class="text-center">Coloque as suas credênciais para entrar:</p>

        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'rememberMe')->checkbox()->label('Lembrar de mim') ?>

            <div class="form-group">
                <?= Html::submitButton('Entrar', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
            </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
