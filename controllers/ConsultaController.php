<?php

namespace app\controllers;

use app\models\Medico;
use app\models\Paciente;
use Yii;
use app\models\Consulta;
use app\models\ConsultaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ConsultaController implements the CRUD actions for Consulta model.
 */
class ConsultaController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Consulta models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ConsultaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=10;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Consulta model.
     * @param int $id ID
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Consulta model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Consulta();

        if ($model->load(Yii::$app->request->post())) {
            $medicoId = $model->medico_id;
            $tipoMedico = $model->medico->tipo_id;
            $dataConsulta = Date('Y-m-d',strtotime($model->data_consulta)); // converts da datetime to date format to compare with the consultation date

            if ($this->getMedicoConsultationStatusPerDay($medicoId,$tipoMedico, $dataConsulta)){

                $model->save();

                Yii::$app->session->setFlash('success','<span>Registado com sucesso!<span>');
                return $this->actionIndex();

            }else{

                Yii::$app->session->setFlash('error', "<span>Este medico atingiu o limite de consultas agendadas para essa data! Agende a sua consulta para outra data!<span>");
                return $this->render('create', [
                    'model' => $model,
                ]);
            }

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Consulta model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $paciente = Paciente::find()->where(['id' => $model->paciente_id])->one();

        if ($model->load(Yii::$app->request->post()) && $paciente->load(Yii::$app->request->post()) ) {

            $paciente->save();
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'paciente' => $paciente,
            ]);
        }
    }

    /**
     * Deletes an existing Consulta model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Consulta model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Consulta the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Consulta::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Gets the status of consultation per medic for a given date
     * @param $medicoId
     * @param $data
     * @return bool
     */
    public function getMedicoConsultationStatusPerDay($medicoId, $tipoMedico, $data){

        $parametros = [':medicoId' => $medicoId, ':tipoMedico' => $tipoMedico, ':data' =>  $data,];

        $status = Yii::$app->db->createCommand(
            'SELECT medico.id FROM medico INNER JOIN tipo ON medico.tipo_id = tipo.id WHERE medico.id = :medicoId AND medico.tipo_id = :tipoMedico AND tipo.numero_consultas_dia > (SELECT Count(consulta.medico_id) AS numero_consultas FROM consulta WHERE consulta.medico_id = :medicoId AND Date(consulta.data_consulta) = :data) GROUP BY medico.id; ')
            ->bindValues($parametros)
            ->queryOne();

        if ($status !== null && $status !== false) {
            return true;
        }
        return false;
    }


}
