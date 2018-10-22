<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "baseprices".
 *
 * @property int $id
 * @property int $iid
 * @property string $purchase_price
 * @property string $base_pice
 * @property string $active_from
 * @property string $active_till
 *
 * @property Items $i
 */
class Baseprices extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'baseprices';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iid'], 'integer'],
            [['purchase_price', 'base_pice'], 'required'],
            [['purchase_price', 'base_pice'], 'number'],
            [['active_from', 'active_till'], 'safe'],
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
            'purchase_price' => 'Purchase Price',
            'base_pice' => 'Base Pice',
            'active_from' => 'Active From',
            'active_till' => 'Active Till',
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
     * @return BasepricesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BasepricesQuery(get_called_class());
    }
}
