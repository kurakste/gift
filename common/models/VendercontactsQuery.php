<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Vendercontacts]].
 *
 * @see Vendercontacts
 */
class VendercontactsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Vendercontacts[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Vendercontacts|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
