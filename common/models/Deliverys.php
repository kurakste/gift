<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "deliverys".
 *
 * @property int $id
 * @property string $cost
 * @property string $description
 * @property int $cid
 *
 * @property Citys $c
 * @property Deliverytocitys[] $deliverytocitys
 */
class Deliverys extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'deliverys';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cost', 'description'], 'required'],
            [['cost'], 'number'],
            [['description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cost' => 'Cost',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeliverytocitys()
    {
        return $this->hasMany(Deliverytocitys::className(), ['did' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return DeliverysQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DeliverysQuery(get_called_class());
    }
}
