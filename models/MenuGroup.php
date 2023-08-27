<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menu_group".
 *
 * @property int $id_group
 * @property int $id_menu
 *
 * @property Menu $menu
 */
class MenuGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_group', 'id_menu'], 'required'],
            [['id_group', 'id_menu'], 'integer'],
            [['id_group', 'id_menu'], 'unique', 'targetAttribute' => ['id_group', 'id_menu']],
            [['id_menu'], 'exist', 'skipOnError' => true, 'targetClass' => Menu::className(), 'targetAttribute' => ['id_menu' => 'id_menu']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_group' => 'Id Group',
            'id_menu' => 'Id Menu',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenu()
    {
        return $this->hasOne(Menu::className(), ['id_menu' => 'id_menu']);
    }
}
