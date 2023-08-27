<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "sppt_e_verifikator".
 *
 * @property integer $verifikator_1
 * @property integer $verifikator_2
 * @property integer $verifikator_3
 *
 * @property \app\models\User $verifikator1
 * @property \app\models\User $verifikator2
 * @property \app\models\User $verifikator3
 */
class SpptEVerifikator extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'verifikator1',
            'verifikator2',
            'verifikator3'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['verifikator_1', 'verifikator_2', 'verifikator_3'], 'required'],
            [['verifikator_1', 'verifikator_2', 'verifikator_3'], 'integer'],
            // [['lock'], 'default', 'value' => '0'],
            // [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sppt_e_verifikator';
    }

    /**
     *
     * @return string
     * overwrite function optimisticLock
     * return string name of field are used to stored optimistic lock
     *
     */

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'verifikator_1' => 'Verifikator 1',
            'verifikator_2' => 'Verifikator 2',
            'verifikator_3' => 'Verifikator 3',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVerifikator1()
    {
        return $this->hasOne(\app\models\User::className(), ['id' => 'verifikator_1']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVerifikator2()
    {
        return $this->hasOne(\app\models\User::className(), ['id' => 'verifikator_2']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVerifikator3()
    {
        return $this->hasOne(\app\models\User::className(), ['id' => 'verifikator_3']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\SpptEVerifikatorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\SpptEVerifikatorQuery(get_called_class());
    }
}
