<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "quotes".
 *
 * @property int $id
 * @property string $body
 */
class Quotes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quotes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['body'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'body' => 'Body',
        ];
    }
}
