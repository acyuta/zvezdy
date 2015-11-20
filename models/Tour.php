<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tour}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $age_group
 * @property integer $concert_id
 * @property string $dances
 * @property integer $is_solo
 * @property integer $program_position
 * @property string $time
 * @property integer $from_year
 * @property integer $to_year
 *
 * @property Couple[] $couples
 * @property Concert $concert
 */
class Tour extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tour}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'age_group', 'concert_id', 'dances', 'program_position', 'from_year', 'to_year'], 'required'],
            [['name', 'age_group', 'dances', 'time'], 'string'],
            [['concert_id', 'is_solo', 'program_position', 'from_year', 'to_year'], 'integer'],
            ['is_solo', 'default', 'value' => 0],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'age_group' => 'Возрастная группа',
            'concert_id' => 'Концерт ID',
            'dances' => 'Танцы',
            'is_solo' => 'Сольная программа',
            'program_position' => 'Позиция в программе',
            'time' => 'Время',
            'from_year' => 'Нижняя граница г.р.',
            'to_year' => 'Верхняя граница г.р.',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCouples()
    {
        return $this->hasMany(Couple::className(), ['tour_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConcert()
    {
        return $this->hasOne(Concert::className(), ['id' => 'concert_id']);
    }

    public function getReadableName()
    {
        return $this->program_position . '. ' . $this->name . ' (' . $this->dances . ')';
    }
}
