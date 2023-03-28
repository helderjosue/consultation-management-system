<?php

/** @var yii\web\View $this */

use app\models\Area;
use app\models\Consulta;
use app\models\Medico;
use app\models\Paciente;
use app\models\Tipo;
use yii\helpers\Html;

$this->title = 'Visão Geral';
?>
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?php echo Medico::find()->count(); ?></h3>
                        <p>Total de Medicos</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <?php echo Html::a('Detalhes', ['/medico/index'], ['class' => 'small-box-footer']) ?>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?php echo Consulta::find()->count(); ?></h3>

                        <p>Total de Consultas</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <?php echo Html::a('Detalhes', ['/consulta/index'], ['class' => 'small-box-footer']) ?>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?php echo Paciente::find()->count(); ?></h3>
                        <p>Total de Pacientes</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <?php echo Html::a('Detalhes', ['/paciente/index'], ['class' => 'small-box-footer']) ?>

                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?php echo Area::find()->count(); ?></h3>
                        <p>Áreas Médicas</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <?php echo Html::a('Detalhes', ['/area/index'], ['class' => 'small-box-footer']) ?>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?php echo Tipo::find()->count(); ?></h3>

                        <p>Tipos de Médicos</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <?php echo Html::a('Detalhes', ['/tipo/index'], ['class' => 'small-box-footer']) ?>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->

        <!-- /.card -->
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
