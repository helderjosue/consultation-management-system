<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Consulta */
/* @var $paciente backend\models\Paciente */

$this->title = 'Marcar Consulta';
$this->params['breadcrumbs'][] = ['label' => 'Consultas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consulta-create">

    <?= $this->render('_form', [
    'model' => $model,
//    'paciente' => $paciente,
    ]) ?>

</div>
