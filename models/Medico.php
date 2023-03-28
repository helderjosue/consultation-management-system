<?php

namespace app\models;

use app\models\User;
use Yii;

/**
 * This is the model class for table "medico".
 *
 * @property int $id
 * @property string $nome
 * @property string $sexo
 * @property int $idade
 * @property string $telefone
 * @property int $tipo_id
 * @property int $area_id
 * @property string $created_at
 * @property int|null $created_by
 * @property string|null $updated_at
 *
 * @property Area $area
 * @property Consulta[] $consultas
 * @property User $createdBy
 * @property Tipo $tipo
 */
class Medico extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'medico';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'sexo', 'idade', 'telefone', 'tipo_id', 'area_id', 'created_at'], 'required' , 'message' => 'Este campo é obrigatório'],
            [['sexo'], 'string'],
            [['idade', 'tipo_id', 'area_id', 'created_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['nome'], 'string', 'max' => 255],
            [['telefone'], 'string', 'max' => 15],
            [['area_id'], 'exist', 'skipOnError' => true, 'targetClass' => Area::class, 'targetAttribute' => ['area_id' => 'id']],
            [['tipo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tipo::class, 'targetAttribute' => ['tipo_id' => 'id']],
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
            'nome' => 'Nome',
            'sexo' => 'Sexo',
            'idade' => 'Idade',
            'telefone' => 'Telefone',
            'tipo_id' => 'Tipo',
            'area_id' => 'Area',
            'created_at' => 'Data de criação',
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
     * Gets query for [[Consultas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getConsultas()
    {
        return $this->hasMany(Consulta::class, ['medico_id' => 'id']);
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
     * Gets query for [[Tipo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTipo()
    {
        return $this->hasOne(Tipo::class, ['id' => 'tipo_id']);
    }
}
