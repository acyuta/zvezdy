<?php

use yii\db\Schema;
use yii\db\Migration;

class m151119_055827_create_couple extends Migration
{
    public $tableName = "{{%couple}}";
    public $tourTable = "{{%tour}}";
    public $clubTable = "{{%club}}";
    public $fk_couple_tour_id = "fk_couple_tour_id";
    public $fk_couple_club_id = "fk_couple_club_id";
    public function safeUp()
    {
        $this->createTable($this->tableName,[
            'id' => $this->primaryKey(),
            'tour_id' => $this->integer()->notNull(),
            'club_id' => $this->integer()->notNull(),
            'bname' => $this->text()->notNull(),
            'bsurname' => $this->text()->notNull(),
            'byear' => $this->integer()->notNull(),
            'gname' => $this->text()->notNull(),
            'gsurname' => $this->text()->notNull(),
            'gyear' => $this->text()->notNull(),
        ]);

        $this->addForeignKey($this->fk_couple_tour_id,$this->tableName,'tour_id',$this->tourTable,'id');
        $this->addForeignKey($this->fk_couple_club_id,$this->tableName,'club_id',$this->clubTable,'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey($this->fk_couple_club_id,$this->tableName);
        $this->dropForeignKey($this->fk_couple_tour_id,$this->tableName);
        $this->dropTable($this->tableName);
    }
}
