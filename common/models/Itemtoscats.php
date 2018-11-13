<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "itemtoscats".
 *
 * @property int $id
 * @property int $iid
 * @property int $scid
 *
 * @property Scategorys $sc
 * @property Items $i
 */
class Itemtoscats extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'itemtoscats';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iid', 'scid'], 'integer'],
            [['scid'], 'exist', 'skipOnError' => true, 'targetClass' => Scategorys::className(), 'targetAttribute' => ['scid' => 'id']],
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
            'scid' => 'Scid',
        ];
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
    public function getI()
    {
        return $this->hasOne(Items::className(), ['id' => 'iid']);
    }
}
