<?php

namespace app\models;

use app\models\User;
use Yii;

/**
 * This is the model class for table "area".
 *
 * @property int $id
 * @property string $nome_area
 * @property string $created_at
 * @property int|null $created_by
 * @property string|null $updated_at
 *
 * @property Consulta[] $consultas
 * @property User $createdBy
 * @property Medico[] $medicos
 * @property Tipo[] $tipos
 */
class Area extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'area';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome_area', 'created_at'], 'required', 'message' => 'Este campo é obrigatório'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_by'], 'integer'],
            [['nome_area'], 'string', 'max' => 255],
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
            'nome_area' => 'Nome da Área',
            'created_at' => 'Data de Registo',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Consultas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getConsultas()
    {
        return $this->hasMany(Consulta::class, ['area_id' => 'id']);
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
     * Gets query for [[Medicos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMedicos()
    {
        return $this->hasMany(Medico::class, ['area_id' => 'id']);
    }

    /**
     * Gets query for [[Tipos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTipos()
    {
        return $this->hasMany(Tipo::class, ['area_id' => 'id']);
    }
}
