<?php

use yii\db\Schema;
use yii\db\Migration;

class m151119_055303_create_concert extends Migration
{
    public $tableName = "{{%concert}}";
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
            'date' => $this->date()->notNull(),
            'organizer' => $this->text()->notNull(),
            'city' => $this->text()->notNull(),
            'place' => $this->text()->notNull(),
            'is_available' => $this->boolean()->defaultValue(false),
            'created_at' => $this->timestamp() .' DEFAULT CURRENT_TIMESTAMP',
        ],$tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }
}
