<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Vendertocity]].
 *
 * @see Vendertocity
 */
class VendertocityQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Vendertocity[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Vendertocity|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
