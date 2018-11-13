<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "venders".
 *
 * @property int $id
 * @property int $cityid
 * @property string $name
 * @property string $address
 * @property string $url
 * @property string $description
 *
 * @property Items[] $items
 * @property Vendercontacts[] $vendercontacts
 * @property Vendertocity[] $vendertocities
 */
class Venders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'venders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'address', 'url', 'cityid'], 'required'],
            [['description'], 'string'],
            [['name', 'address', 'url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cityid' => 'Id of city',
            'name' => 'Name',
            'address' => 'Address',
            'url' => 'Url',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(Items::className(), ['vid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendercontacts()
    {
        return $this->hasMany(Vendercontacts::className(), ['vid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendertocities()
    {
        return $this->hasMany(Vendertocity::className(), ['vid' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return VendersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VendersQuery(get_called_class());
    }
}
