<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "deliverytocitys".
 *
 * @property int $id
 * @property int $did
 * @property int $cid
 *
 * @property Deliverys $d
 * @property Citys $c
 */
class Deliverytocitys extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'deliverytocitys';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['did', 'cid'], 'integer'],
            [['did'], 'exist', 'skipOnError' => true, 'targetClass' => Deliverys::className(), 'targetAttribute' => ['did' => 'id']],
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
            'did' => 'Did',
            'cid' => 'Cid',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getD()
    {
        return $this->hasOne(Deliverys::className(), ['id' => 'did']);
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
     * @return VendertocityQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VendertocityQuery(get_called_class());
    }
}
