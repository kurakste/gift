<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Districts]].
 *
 * @see Districts
 */
class DistrictsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Districts[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Districts|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
