<?php

use yii\db\Migration;

class m230314_202058_create_table_medico extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%medico}}',
            [
                'id' => $this->primaryKey(),
                'nome' => $this->string()->notNull(),
                'sexo' => $this->string()->notNull(),
                'idade' => $this->integer()->notNull(),
                'telefone' => $this->string(15)->notNull(),
                'tipo_id' => $this->integer()->notNull(),
                'area_id' => $this->integer()->notNull(),
                'created_at' => $this->dateTime()->notNull(),
                'created_by' => $this->integer(),
                'updated_at' => $this->dateTime(),
            ],
            $tableOptions
        );

        $this->createIndex('medico_area_id_fk', '{{%medico}}', ['area_id']);
        $this->createIndex('medico_tipo_id_fk', '{{%medico}}', ['tipo_id']);
        $this->createIndex('medico_user_id_fk', '{{%medico}}', ['created_by']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%medico}}');
    }
}
