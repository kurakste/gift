<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Baseprices]].
 *
 * @see Baseprices
 */
class BasepricesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Baseprices[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Baseprices|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
