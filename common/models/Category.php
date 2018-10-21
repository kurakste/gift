<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categorys".
 *
 * @property int $id
 * @property string $name
 * @property string $cpu
 * @property string $description
 * @property string $image
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categorys';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'image'], 'required'],
            [['cpu'], 'string'],
            [['name', 'description', 'image'], 'string', 'max' => 255],
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
}
