<?php

use yii\db\Migration;

class m230314_202056_create_table_area extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%area}}',
            [
                'id' => $this->primaryKey(),
                'nome_area' => $this->string()->notNull(),
                'created_at' => $this->dateTime()->notNull(),
                'created_by' => $this->integer(),
                'updated_at' => $this->dateTime(),
            ],
            $tableOptions
        );

        $this->createIndex('area_user_id_fk', '{{%area}}', ['created_by']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%area}}');
    }
}
