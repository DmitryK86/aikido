<?php

namespace app\models;

use app\behaviors\ArImageBehavior;
use app\behaviors\ArOneImageBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;
use yiidreamteam\upload\ImageUploadBehavior;

/**
 * This is the model class for table "events".
 *
 * @property int $id
 * @property string $slug
 * @property string $title
 * @property string $description
 * @property string $date
 * @property int $enabled
 * @property string $place
 * @property string $period
 * @property string $image
 */
class Events extends \yii\db\ActiveRecord
{
    public $image;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'events';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => ArImageBehavior::class,
                'filePath' => '@webroot/uploads/events/[[basename]]',
                'fileUrl' => '/uploads/events/[[basename]]',
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['slug', 'title', 'date'], 'required'],
            [['description'], 'string'],
            [['date'], 'safe'],
            [['enabled'], 'integer'],
            [['slug', 'title', 'place', 'period'], 'string', 'max' => 255],
            [['slug'], 'unique'],
            ['image', 'file', 'extensions' => 'jpeg, gif, png, jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'slug' => Yii::t('app', 'URL'),
            'title' => Yii::t('app','Назва події'),
            'description' => Yii::t('app','Опис'),
            'date' => Yii::t('app','Час початку'),
            'enabled' => Yii::t('app','Ввімкнена'),
            'image' => Yii::t('app','Картинка'),
            'place' => Yii::t('app', 'Місце проведення'),
            'period' => Yii::t('app', 'Тривалість заходу'),
        ];
    }
}
