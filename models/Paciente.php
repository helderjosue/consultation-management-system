<?php

namespace app\models;

use app\models\User;
use Yii;

/**
 * This is the model class for table "paciente".
 *
 * @property int $id
 * @property string $nome
 * @property string $sexo
 * @property int $idade
 * @property string $endereco
 * @property string $telefone
 * @property string $profissao
 * @property string $created_at
 * @property int|null $created_by
 * @property string|null $updated_at
 *
 * @property Consulta[] $consultas
 * @property User $createdBy
 */
class Paciente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paciente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'sexo', 'idade', 'endereco', 'telefone', 'profissao', 'created_at'], 'required', 'message' => 'Este campo é obrigatório'],
            [['sexo'], 'string'],
            [['idade', 'created_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['nome', 'endereco', 'profissao'], 'string', 'max' => 255],
            [['telefone'], 'string', 'max' => 15],
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
            'nome' => 'Nome do Paciente',
            'sexo' => 'Gênero',
            'idade' => 'Idade',
            'endereco' => 'Endereço',
            'telefone' => 'Número de Telefone',
            'profissao' => 'Profissão',
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
        return $this->hasMany(Consulta::class, ['paciente_id' => 'id']);
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
}
