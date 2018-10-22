<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vendercontacts".
 *
 * @property int $id
 * @property int $vid
 * @property string $name
 * @property string $mobile_phone
 * @property string $work_phone
 * @property string $email
 * @property string $skype
 *
 * @property Venders $v
 */
class Vendercontacts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vendercontacts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vid'], 'integer'],
            [['name', 'mobile_phone', 'work_phone', 'email', 'skype'], 'required'],
            [['name', 'mobile_phone', 'work_phone', 'email', 'skype'], 'string', 'max' => 255],
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
            'vid' => 'Vid',
            'name' => 'Name',
            'mobile_phone' => 'Mobile Phone',
            'work_phone' => 'Work Phone',
            'email' => 'Email',
            'skype' => 'Skype',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getV()
    {
        return $this->hasOne(Venders::className(), ['id' => 'vid']);
    }

    /**
     * {@inheritdoc}
     * @return VendercontactsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VendercontactsQuery(get_called_class());
    }
}
