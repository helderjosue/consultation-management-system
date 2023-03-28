<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Medico */

$this->title = 'Actualizar Medico: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Medicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="medico-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
