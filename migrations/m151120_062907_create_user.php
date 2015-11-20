<?php

use yii\db\Schema;
use yii\db\Migration;

class m151120_062907_create_user extends Migration
{
    public $tableName = "{{%user}}";
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable($this->tableName,[
            'id' => $this->primaryKey(),
            'username' => $this->text()->notNull(),
            'password_hash' => $this->text()->notNull(),
            'authKey' => $this->text()->notNull(),
            'accessToken' => $this->text()->notNull(),
            'created_at' => $this->timestamp() . ' DEFAULT CURRENT_TIMESTAMP'
        ],$tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }
}
