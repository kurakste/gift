<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vendertocity".
 *
 * @property int $id
 * @property int $vid
 * @property int $cid
 *
 * @property Citys $c
 * @property Venders $v
 */
class Vendertocity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vendertocity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vid', 'cid'], 'integer'],
            [['cid'], 'exist', 'skipOnError' => true, 'targetClass' => Citys::className(), 'targetAttribute' => ['cid' => 'id']],
            [['vid'], 'exist', 'skipOnError' => true, 'targetClass' => Venders::className(), 'targetAttribute' => ['vid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vid' => 'Vid',
            'cid' => 'Cid',
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
     * @return \yii\db\ActiveQuery
     */
    public function getV()
    {
        return $this->hasOne(Venders::className(), ['id' => 'vid']);
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
