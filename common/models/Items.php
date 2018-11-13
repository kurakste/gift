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


    public function getFcats()
    {
        return $this->hasMany(Fcategorys::className(), ['id' => 'fcid'])
            ->viaTable('itemtofcats', ['iid' => 'id']);
    }
    
    public function getScats()
    {
        return $this->hasMany(Scategorys::className(), ['id' => 'scid'])
            ->viaTable('itemtoscats', ['iid' => 'id']);
    }

    /* 
     * Calculate actual base price today. If today defined more then one prices
     * or define no one price function will returns false. If today defined one
     *  price it will return price. 
     *
     * @return num(4,2) actual price or false;
     */

    public function getActualPrice() 
    {
        $time = new \DateTime('now');
        $today = $time->format('Y-m-d');
        
        $prices = \common\models\Baseprices::find()
            ->where(['iid' => $this->id])
            ->andWhere(['<=', 'active_from', $today])
            ->andWhere(['>', 'active_till', $today])
            ->all(); 
        if (count($prices) != 1) {
            return false;
        };

        $price = $prices[0]->base_pice;
        return $price;
    }

    /* 
     * If item has 1 active discount today it returns true
     * in other case it return false. 
     *
     * @return bullean 
     */
    public function hasDiscount()
    {
        $time = new \DateTime('now');
        $today = $time->format('Y-m-d');

        $discounts = \common\models\Discounts::find()
            ->where(['iid' => $this->id])
            ->andWhere(['<=', 'start_at', $today])
            ->andWhere(['>', 'stop_at', $today])
            ->all();

        if (count($discounts) === 1) {
            return true;
        } else {
            return false;
        };
        
    }
    
    /* 
     * returns size of discount (0.3) or false
     *
     */
    public function  getDiscount()
    {
        if ($this->hasDiscount() === false) {
            return false;
        }

        $time = new \DateTime('now');
        $today = $time->format('Y-m-d');

        $discount = \common\models\Discounts::find()
            ->where(['iid' => $this->id])
            ->andWhere(['<=', 'start_at', $today])
            ->andWhere(['>', 'stop_at', $today])
            ->one();

        return $discount->discount;
    }


    public function getPriceWithdiscount()
    {
        $discount = $this->getDiscount();
        $actprice = $this->getActualPrice();
        if ((!$discount) && (!$actprice)) {
            return false;
        } else {
            return ((1-$discount)*$actprice);
        
        }
        
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

    public function getVenders()
    {
        return $this->hasOne(Venders::className(), ['id' => 'vid']);
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

    public function getMainImage() 
    {
        $images = $this->images; 


        foreach ($images as $image) {
            if ($image->main === 1) {
            return $image->path;
            }
            return '';
        }
    
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
