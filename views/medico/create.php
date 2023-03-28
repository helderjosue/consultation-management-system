<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Medico */

$this->title = 'Adicionar Médico';
$this->params['breadcrumbs'][] = ['label' => 'Medicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="medico-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
