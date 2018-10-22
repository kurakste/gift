<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Scategorys]].
 *
 * @see Scategorys
 */
class ScategorysQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Scategorys[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Scategorys|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
