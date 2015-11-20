<?php

use yii\db\Schema;
use yii\db\Migration;

class m151119_055105_create_clubs extends Migration
{
    public $tableName = "{{%club}}";
    public function safeUp()
    {
        $this->createTable($this->tableName,[
            'id' => $this->primaryKey(),
            'name' => $this->text()->notNull(),
            'city' => $this->text()->notNull(),
            'leader' => $this->text()->notNull(),
            'region' => $this->integer()->defaultValue(70), // Томск по-умолчанию
        ]);
    }

    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }
}
