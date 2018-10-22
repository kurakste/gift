<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "discounts".
 *
 * @property int $id
 * @property int $iid
 * @property double $discount
 * @property string $description
 * @property string $created_at
 * @property string $start_at
 * @property string $stop_at
 *
 * @property Items $i
 */
class Discounts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'discounts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iid'], 'integer'],
            [['discount'], 'number'],
            [['description'], 'required'],
            [['created_at', 'start_at', 'stop_at'], 'safe'],
            [['description'], 'string', 'max' => 255],
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
            'discount' => 'Discount',
            'description' => 'Description',
            'created_at' => 'Created At',
            'start_at' => 'Start At',
            'stop_at' => 'Stop At',
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
     * @return DiscountsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DiscountsQuery(get_called_class());
    }
}
