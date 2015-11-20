<?php

use yii\db\Schema;
use yii\db\Migration;

class m151120_062907_create_user extends Migration
{
    public $tableName = "{{%user}}";
    public function safeUp()
    {
        $this->createTable($this->tableName,[
            'id' => $this->primaryKey(),
            'username' => $this->text()->notNull(),
            'password_hash' => $this->text()->notNull(),
            'authKey' => $this->text()->notNull(),
            'accessToken' => $this->text()->notNull(),
            'created_at' => $this->timestamp() . ' DEFAULT CURRENT_TIMESTAMP'
        ]);
    }

    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }
}
