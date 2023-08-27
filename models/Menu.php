<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property int $id_menu
 * @property int $parent_id
 * @property string $nama
 * @property string $link
 * @property string $icon
 * @property int $order_id
 *
 * @property MenuGroup[] $menuGroups
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'order_id'], 'integer'],
            [['nama', 'link', 'icon'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_menu' => 'Id Menu',
            'parent_id' => 'Parent ID',
            'nama' => 'Nama',
            'link' => 'Link',
            'icon' => 'Icon',
            'order_id' => 'Order ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenuGroups()
    {
        return $this->hasMany(MenuGroup::className(), ['id_menu' => 'id_menu']);
    }
}
