<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "districts".
 *
 * @property int $id
 * @property int $cid
 * @property string $name
 * @property string $notes
 *
 * @property Citys $c
 */
class Districts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'districts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cid'], 'integer'],
            [['name', 'notes'], 'required'],
            [['name', 'notes'], 'string', 'max' => 255],
            [['cid'], 'exist', 'skipOnError' => true, 'targetClass' => Citys::className(), 'targetAttribute' => ['cid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cid' => 'Cid',
            'name' => 'Name',
            'notes' => 'Notes',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getC()
    {
        return $this->hasOne(Citys::className(), ['id' => 'cid']);
    }

    /**
     * {@inheritdoc}
     * @return DistrictsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DistrictsQuery(get_called_class());
    }
}
