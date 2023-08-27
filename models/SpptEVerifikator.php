<?php

namespace app\models;

use Yii;
use \app\models\base\SpptEVerifikator as BaseSpptEVerifikator;

/**
 * This is the model class for table "sppt_e_verifikator".
 */
class SpptEVerifikator extends BaseSpptEVerifikator
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['verifikator_1', 'verifikator_2', 'verifikator_3'], 'required'],
            [['verifikator_1', 'verifikator_2', 'verifikator_3'], 'integer'],
            // [['lock'], 'default', 'value' => '0'],
            // [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
