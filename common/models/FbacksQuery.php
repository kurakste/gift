<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Fbacks]].
 *
 * @see Fbacks
 */
class FbacksQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Fbacks[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Fbacks|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
