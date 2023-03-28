<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Consulta */
/* @var $paciente backend\models\Paciente */

$this->title = 'Actualizar Consulta: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Consultas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="consulta-update">

    <?= $this->render('_form', [
        'model' => $model,
        'paciente' => $paciente,
    ]) ?>

</div>
