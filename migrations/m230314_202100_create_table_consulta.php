<?php

use yii\db\Migration;

class m230314_202100_create_table_consulta extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%consulta}}',
            [
                'id' => $this->primaryKey(),
                'paciente_id' => $this->integer()->notNull(),
                'area_id' => $this->integer()->notNull(),
                'medico_id' => $this->integer()->notNull(),
                'data_consulta' => $this->dateTime()->notNull(),
                'created_at' => $this->dateTime()->notNull(),
                'created_by' => $this->integer(),
                'updated_at' => $this->dateTime(),
            ],
            $tableOptions
        );

        $this->createIndex('consulta_area_id_fk', '{{%consulta}}', ['area_id']);
        $this->createIndex('consulta_medico_id_fk', '{{%consulta}}', ['medico_id']);
        $this->createIndex('consulta_paciente_id_fk', '{{%consulta}}', ['paciente_id']);
        $this->createIndex('consulta_user_id_fk', '{{%consulta}}', ['created_by']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%consulta}}');
    }
}
