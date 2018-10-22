<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sizes".
 *
 * @property int $id
 * @property int $iid
 * @property string $description
 * @property string $weigth
 * @property string $width
 * @property string $height
 * @property string $length
 *
 * @property Items $i
 */
class Sizes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sizes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iid'], 'integer'],
            [['description'], 'string'],
            [['weigth', 'width', 'height', 'length'], 'required'],
            [['weigth', 'width', 'height', 'length'], 'number'],
            [['iid'], 'exist', 'skipOnError' => true, 'targetClass' => Items::className(), 'targetAttribute' => ['iid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'iid' => 'Iid',
            'description' => 'Description',
            'weigth' => 'Weigth',
            'width' => 'Width',
            'height' => 'Height',
            'length' => 'Length',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getI()
    {
        return $this->hasOne(Items::className(), ['id' => 'iid']);
    }

    /**
     * {@inheritdoc}
     * @return SizesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SizesQuery(get_called_class());
    }
}
