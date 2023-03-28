<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Area */

$this->title = 'Adicionar Area';
$this->params['breadcrumbs'][] = ['label' => 'Areas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="area-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
