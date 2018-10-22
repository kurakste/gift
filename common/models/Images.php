<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "images".
 *
 * @property int $id
 * @property int $iid
 * @property string $alt
 * @property string $path
 * @property int $main
 *
 * @property Items $i
 */
class Images extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iid', 'main'], 'integer'],
            [['alt', 'path'], 'required'],
            [['alt', 'path'], 'string', 'max' => 255],
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
            'alt' => 'Alt',
            'path' => 'Path',
            'main' => 'Main',
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
     * @return ImagesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ImagesQuery(get_called_class());
    }
}
