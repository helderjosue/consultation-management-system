<?php

namespace app\models;

use app\models\User;
use app\models\Paciente;
use app\models\Medico;
use app\models\Area;
use Yii;

/**
 * This is the model class for table "consulta".
 *
 * @property int $id
 * @property int $paciente_id
 * @property int $area_id
 * @property int $medico_id
 * @property string $data_consulta
 * @property string $created_at
 * @property int|null $created_by
 * @property string|null $updated_at
 *
 * @property Area $area
 * @property User $createdBy
 * @property Medico $medico
 * @property Paciente $paciente
 */
class Consulta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'consulta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['paciente_id', 'area_id', 'medico_id', 'data_consulta', 'created_at'], 'required', 'message' => 'Este campo é obrigatório'],
            [['paciente_id', 'area_id', 'medico_id', 'created_by'], 'integer'],
            [['data_consulta', 'created_at', 'updated_at'], 'safe'],
            [['area_id'], 'exist', 'skipOnError' => true, 'targetClass' => Area::class, 'targetAttribute' => ['area_id' => 'id']],
            [['medico_id'], 'exist', 'skipOnError' => true, 'targetClass' => Medico::class, 'targetAttribute' => ['medico_id' => 'id']],
            [['paciente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Paciente::class, 'targetAttribute' => ['paciente_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'paciente_id' => 'Nome do Paciente',
            'area_id' => 'Área de Atendimento',
            'medico_id' => 'Nome do Médico',
            'data_consulta' => 'Data Prevista para Consulta',
            'created_at' => 'Data de Registo',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Area]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArea()
    {
        return $this->hasOne(Area::class, ['id' => 'area_id']);
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    /**
     * Gets query for [[Medico]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMedico()
    {
        return $this->hasOne(Medico::class, ['id' => 'medico_id']);
    }

    /**
     * Gets query for [[Paciente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaciente()
    {
        return $this->hasOne(Paciente::class, ['id' => 'paciente_id']);
    }
}
