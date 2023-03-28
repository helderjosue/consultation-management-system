<?php

use yii\db\Migration;

class m230314_202057_create_table_tipo extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%tipo}}',
            [
                'id' => $this->primaryKey(),
                'nome' => $this->string()->notNull(),
                'area_id' => $this->integer()->notNull(),
                'created_at' => $this->dateTime()->notNull(),
                'created_by' => $this->integer(),
                'updated_at' => $this->dateTime(),
                'numero_consultas_dia' => $this->integer()->notNull(),
            ],
            $tableOptions
        );

        $this->createIndex('tipo_area_id_fk', '{{%tipo}}', ['area_id']);
        $this->createIndex('tipo_user_id_fk', '{{%tipo}}', ['created_by']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%tipo}}');
    }
}
