<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%club}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $city
 * @property string $leader
 * @property integer $region
 */
class Club extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%club}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'city', 'leader'], 'required'],
            [['name', 'city', 'leader'], 'string', 'min' => 3],
            [['region'], 'integer',],
            ['region', 'default', 'value' => 70],
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
            'city' => 'Город',
            'leader' => 'Реководитель',
            'region' => 'Регион',
        ];
    }
}
