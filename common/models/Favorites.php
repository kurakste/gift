<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "favorites".
 *
 * @property int $id
 * @property string $favid
 * @property int $iid
 *
 * @property Items $i
 */
class Favorites extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'favorites';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['favid'], 'required'],
            [['iid'], 'integer'],
            [['favid'], 'string', 'max' => 255],
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
            'favid' => 'Favid',
            'iid' => 'Iid',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasOne(Items::className(), ['id' => 'iid']);
    }
}
