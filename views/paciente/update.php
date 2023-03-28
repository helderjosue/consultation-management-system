<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Paciente */

$this->title = 'Actualizar Paciente: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pacientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="paciente-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
