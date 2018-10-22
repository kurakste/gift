<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "scategorys".
 *
 * @property int $id
 * @property string $name
 * @property string $cpu
 * @property string $description
 * @property string $image
 *
 * @property Items[] $items
 */
class Scategorys extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'scategorys';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'cpu', 'image'], 'required'],
            [['name', 'cpu', 'description', 'image'], 'string', 'max' => 255],
            [['cpu'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'cpu' => 'Cpu',
            'description' => 'Description',
            'image' => 'Image',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(Items::className(), ['scid' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return ScategorysQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ScategorysQuery(get_called_class());
    }
}
