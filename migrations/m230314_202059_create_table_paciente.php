<?php

use yii\db\Migration;

class m230314_202059_create_table_paciente extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%paciente}}',
            [
                'id' => $this->primaryKey(),
                'nome' => $this->string()->notNull(),
                'sexo' => $this->string()->notNull(),
                'idade' => $this->integer()->notNull(),
                'endereco' => $this->string()->notNull(),
                'telefone' => $this->string(15)->notNull(),
                'profissao' => $this->string()->notNull(),
                'created_at' => $this->dateTime()->notNull(),
                'created_by' => $this->integer(),
                'updated_at' => $this->dateTime(),
            ],
            $tableOptions
        );

        $this->createIndex('paciente_user_id_fk', '{{%paciente}}', ['created_by']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%paciente}}');
    }
}
