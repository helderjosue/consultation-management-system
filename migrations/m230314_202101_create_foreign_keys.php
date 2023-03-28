<?php

use yii\db\Migration;

class m230314_202101_create_foreign_keys extends Migration
{
    public function safeUp()
    {
        $this->addForeignKey(
            'area_user_id_fk',
            '{{%area}}',
            ['created_by'],
            '{{%user}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'tipo_area_id_fk',
            '{{%tipo}}',
            ['area_id'],
            '{{%area}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'tipo_user_id_fk',
            '{{%tipo}}',
            ['created_by'],
            '{{%user}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'medico_area_id_fk',
            '{{%medico}}',
            ['area_id'],
            '{{%area}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'medico_tipo_id_fk',
            '{{%medico}}',
            ['tipo_id'],
            '{{%tipo}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'medico_user_id_fk',
            '{{%medico}}',
            ['created_by'],
            '{{%user}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'paciente_user_id_fk',
            '{{%paciente}}',
            ['created_by'],
            '{{%user}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'consulta_area_id_fk',
            '{{%consulta}}',
            ['area_id'],
            '{{%area}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'consulta_medico_id_fk',
            '{{%consulta}}',
            ['medico_id'],
            '{{%medico}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'consulta_paciente_id_fk',
            '{{%consulta}}',
            ['paciente_id'],
            '{{%paciente}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'consulta_user_id_fk',
            '{{%consulta}}',
            ['created_by'],
            '{{%user}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('consulta_user_id_fk', '{{%consulta}}');
        $this->dropForeignKey('consulta_paciente_id_fk', '{{%consulta}}');
        $this->dropForeignKey('consulta_medico_id_fk', '{{%consulta}}');
        $this->dropForeignKey('consulta_area_id_fk', '{{%consulta}}');
        $this->dropForeignKey('paciente_user_id_fk', '{{%paciente}}');
        $this->dropForeignKey('medico_user_id_fk', '{{%medico}}');
        $this->dropForeignKey('medico_tipo_id_fk', '{{%medico}}');
        $this->dropForeignKey('medico_area_id_fk', '{{%medico}}');
        $this->dropForeignKey('tipo_user_id_fk', '{{%tipo}}');
        $this->dropForeignKey('tipo_area_id_fk', '{{%tipo}}');
        $this->dropForeignKey('area_user_id_fk', '{{%area}}');
    }
}
