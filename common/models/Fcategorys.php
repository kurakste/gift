<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "fcategorys".
 *
 * @property int $id
 * @property string $name
 * @property string $cpu
 * @property string $description
 * @property string $image
 *
 * @property Items[] $items
 */
class Fcategorys extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fcategorys';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'cpu', 'image'], 'required'],
            [['description'], 'string'],
            [['name', 'cpu', 'image'], 'string', 'max' => 255],
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
        return $this->hasMany(Items::className(), ['fcid' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return FcategorysQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FcategorysQuery(get_called_class());
    }
}
