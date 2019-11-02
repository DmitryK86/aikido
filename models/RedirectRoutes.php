<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "redirect_routs".
 *
 * @property int $id
 * @property string $from_route
 * @property string $to_route
 * @property int $enabled
 */
class RedirectRoutes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'redirect_routes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['from_route', 'to_route'], 'required'],
            [['enabled'], 'integer'],
            [['from_route', 'to_route'], 'string', 'max' => 255],
            [['from_route'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'from_route' => 'From Route',
            'to_route' => 'To Route',
            'enabled' => 'Enabled',
        ];
    }

    public function beforeSave($insert)
    {
        $this->from_route = sprintf('/%s/', trim($this->from_route, '/'));
        if ($this->to_route != '/'){
            $this->to_route = sprintf('/%s/', trim($this->to_route, '/'));
        }

        return parent::beforeSave($insert);
    }
}
