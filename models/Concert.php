<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%concert}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $date
 * @property string $organizer
 * @property string $city
 * @property string $place
 * @property integer $is_available
 * @property string $created_at
 *
 * @property Tour[] $tours
 */
class Concert extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%concert}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'date', 'organizer', 'city', 'place'], 'required'],
            [['name', 'organizer', 'city', 'place'], 'string'],
            [['date', 'created_at'], 'safe'],
            [['is_available'], 'integer']
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
            'date' => 'Дата проведения',
            'organizer' => 'Организатор',
            'city' => 'Город',
            'place' => 'Место проведения',
            'is_available' => 'Включен',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTours()
    {
        return $this->hasMany(Tour::className(), ['concert_id' => 'id']);
    }
}
