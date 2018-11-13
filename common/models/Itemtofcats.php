<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "itemtofcats".
 *
 * @property int $id
 * @property int $iid
 * @property int $fcid
 *
 * @property Fcategorys $fc
 * @property Items $i
 */
class Itemtofcats extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'itemtofcats';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iid', 'fcid'], 'integer'],
            [['fcid'], 'exist', 'skipOnError' => true, 'targetClass' => Fcategorys::className(), 'targetAttribute' => ['fcid' => 'id']],
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
            'fcid' => 'Fcid',
        ];
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
    public function getI()
    {
        return $this->hasOne(Items::className(), ['id' => 'iid']);
    }
}
