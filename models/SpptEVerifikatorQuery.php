<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SpptEVerifikator]].
 *
 * @see SpptEVerifikator
 */
class SpptEVerifikatorQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return SpptEVerifikator[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SpptEVerifikator|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
