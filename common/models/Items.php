<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "items".
 *
 * @property int $id
 * @property int $fcid
 * @property int $scid
 * @property int $vid
 * @property string $exid
 * @property string $name
 * @property string $cpu
 * @property string $short_description
 * @property string $description
 * @property int $lifetime
 * @property int $rank
 * @property int $phisical
 *
 * @property Baseprices[] $baseprices
 * @property Deliverys[] $deliverys
 * @property Deliverytocitys[] $deliverytocitys
 * @property Discounts[] $discounts
 * @property Fbacks[] $fbacks
 * @property Images[] $images
 * @property Fcategorys $fc
 * @property Scategorys $sc
 * @property Venders $v
 * @property Sizes[] $sizes
 */
class Items extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fcid', 'scid', 'vid', 'lifetime', 'rank', 'phisical'], 'integer'],
            [['exid', 'name', 'cpu', 'short_description', 'phisical'], 'required'],
            [['description'], 'string'],
            [['exid', 'name', 'cpu', 'short_description'], 'string', 'max' => 255],
            [['cpu'], 'unique'],
            [['fcid'], 'exist', 'skipOnError' => true, 'targetClass' => Fcategorys::className(), 'targetAttribute' => ['fcid' => 'id']],
            [['scid'], 'exist', 'skipOnError' => true, 'targetClass' => Scategorys::className(), 'targetAttribute' => ['scid' => 'id']],
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
            'fcid' => 'Fcid',
            'scid' => 'Scid',
            'vid' => 'Vid',
            'exid' => 'Exid',
            'name' => 'Name',
            'cpu' => 'Cpu',
            'short_description' => 'Short Description',
            'description' => 'Description',
            'lifetime' => 'Lifetime',
            'rank' => 'Rank',
            'phisical' => 'Phisical',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBaseprices()
    {
        return $this->hasMany(Baseprices::className(), ['iid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeliverys()
    {
        return $this->hasMany(Deliverys::className(), ['iid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeliverytocitys()
    {
        return $this->hasMany(Deliverytocitys::className(), ['iid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiscounts()
    {
        return $this->hasMany(Discounts::className(), ['iid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFbacks()
    {
        return $this->hasMany(Fbacks::className(), ['iid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Images::className(), ['iid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFc()
    {
        return $this->hasOne(Fcategorys::className(), ['id' => 'fcid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSc()
    {
        return $this->hasOne(Scategorys::className(), ['id' => 'scid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getV()
    {
        return $this->hasOne(Venders::className(), ['id' => 'vid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSizes()
    {
        return $this->hasMany(Sizes::className(), ['iid' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return ItemsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ItemsQuery(get_called_class());
    }
}
