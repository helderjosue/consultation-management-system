<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ConsultaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Consultas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consulta-index box box-primary">
    <?php Pjax::begin(); ?>
    <div class="box-header with-border">
        <?= Html::a('Adicionar Consulta', ['create'], ['class' => 'btn btn-success btn-flat float-right rounded']) ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
//                ['class' => 'yii\grid\SerialColumn'],

                'id',
                [
                        'attribute' => 'paciente_id',
                        'value' => 'paciente.nome'
                ],
                [
                    'attribute' => 'area_id',
                    'value' => 'area.nome_area'
                ],
                [
                    'attribute' => 'medico_id',
                    'value' => 'medico.nome',
                ],
                [
                    'attribute' => 'data_consulta',
                    'format' => ['datetime', 'php:d-m-Y H:i']
                ],
                [
                    'attribute' => 'created_at',
                    'format' => ['datetime', 'php:d-m-Y H:i']
                ],
                // 'created_by',
                // 'updated_at',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
    <?php Pjax::end(); ?>
</div>
