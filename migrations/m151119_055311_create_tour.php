<?php

use yii\db\Schema;
use yii\db\Migration;

class m151119_055311_create_tour extends Migration
{
    public $tableName = "{{%tour}}";
    public $fk_concert = "fk_tour_concert_id";
    private $concertTable = "{{%concert}}";

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
            'age_group' => $this->text()->notNull(),// ??Надо ли
            'concert_id' => $this->integer()->notNull(),
            'dances' => $this->text()->notNull(),
            'is_solo' => $this->boolean()->defaultValue(false),
            'program_position' => $this->integer()->notNull(),
            'time' => $this->text()->defaultValue(null),
            'from_year' => $this->integer()->notNull(),
            'to_year' => $this->integer()->notNull(),
        ],$tableOptions);

        $this->addForeignKey($this->fk_concert,$this->tableName,'concert_id',$this->concertTable,'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey($this->fk_concert,$this->tableName);
        $this->dropTable($this->tableName);
    }
}
