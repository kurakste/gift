<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Sizes]].
 *
 * @see Sizes
 */
class SizesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Sizes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Sizes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
