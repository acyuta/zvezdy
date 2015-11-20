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
        ]);

        $this->addForeignKey($this->fk_concert,$this->tableName,'concert_id',$this->concertTable,'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey($this->fk_concert,$this->tableName);
        $this->dropTable($this->tableName);
    }
}
