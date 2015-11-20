<?php

use yii\db\Schema;
use yii\db\Migration;

class m151119_055105_create_clubs extends Migration
{
    public $tableName = "{{%club}}";
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable($this->tableName,[
            'id' => $this->primaryKey(),
            'name' => $this->text()->notNull(),
            'city' => $this->text()->notNull(),
            'leader' => $this->text()->notNull(),
            'region' => $this->integer()->defaultValue(70), // Томск по-умолчанию
        ],$tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }
}
