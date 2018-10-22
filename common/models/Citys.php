<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "citys".
 *
 * @property int $id
 * @property int $code
 * @property string $name
 * @property string $cpu
 * @property string $notes
 *
 * @property Districts[] $districts
 * @property Vendertocity[] $vendertocities
 */
class Citys extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'citys';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code'], 'integer'],
            [['name', 'cpu', 'notes'], 'required'],
            [['name', 'cpu', 'notes'], 'string', 'max' => 255],
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
            'code' => 'Code',
            'name' => 'Name',
            'cpu' => 'Cpu',
            'notes' => 'Notes',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistricts()
    {
        return $this->hasMany(Districts::className(), ['cid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendertocities()
    {
        return $this->hasMany(Vendertocity::className(), ['cid' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return CitysQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CitysQuery(get_called_class());
    }
}
