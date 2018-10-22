<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "fbacks".
 *
 * @property int $id
 * @property int $iid
 * @property int $oid
 * @property string $name
 * @property string $image
 * @property string $date
 * @property string $fbacks
 * @property int $rating
 *
 * @property Items $i
 */
class Fbacks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fbacks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iid', 'oid', 'rating'], 'integer'],
            [['name', 'image'], 'required'],
            [['date'], 'safe'],
            [['fbacks'], 'string'],
            [['name', 'image'], 'string', 'max' => 255],
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
            'oid' => 'Oid',
            'name' => 'Name',
            'image' => 'Image',
            'date' => 'Date',
            'fbacks' => 'Fbacks',
            'rating' => 'Rating',
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
     * @return FbacksQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FbacksQuery(get_called_class());
    }
}
