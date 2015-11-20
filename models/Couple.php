<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%couple}}".
 *
 * @property integer $id
 * @property integer $tour_id
 * @property integer $club_id
 * @property string $bname
 * @property string $bsurname
 * @property integer $byear
 * @property string $gname
 * @property string $gsurname
 * @property string $gyear
 *
 * @property Tour $tour
 */
class Couple extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%couple}}';
    }

    public static function getBoysNames()
    {
        return self::find()->select('bname')->asArray(true)->all();
    }

    public static function getGirlsNames()
    {
        return self::find()->select('gname')->asArray(true)->all();
    }

    public static function getBoysSurnames()
    {
        return self::find()->select('bsurname')->asArray(true)->all();
    }

    public static function getGirlsSurnames()
    {
        return self::find()->select('gsurname')->asArray(true)->all();
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tour_id', 'bname', 'bsurname', 'byear', 'gname', 'gsurname', 'gyear', 'club_id'], 'required'],
            [['tour_id', 'byear', 'gyear', 'club_id'], 'integer'],
            [['bname', 'bsurname', 'gname', 'gsurname'], 'string', 'min' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tour_id' => 'Конкурсный тур',
            'club_id' => 'Клуб',
            'bname' => 'Имя партнера',
            'bsurname' => 'Фамилия партнера',
            'byear' => 'Г.р. партнера',
            'gname' => 'Имя Парнтерши',
            'gsurname' => 'Фамилия партнерши',
            'gyear' => 'Г.р. партнерши',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTour()
    {
        return $this->hasOne(Tour::className(), ['id' => 'tour_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClub()
    {
        return $this->hasOne(Club::className(), ['id' => 'club_id']);
    }
}
