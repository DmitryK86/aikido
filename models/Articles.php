<?php

namespace app\models;

use app\behaviors\ArImageBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "articles".
 *
 * @property int $id
 * @property string $slug
 * @property string $title
 * @property string $subtitle
 * @property string $text
 * @property string $created_at
 * @property int $enabled
 */
class Articles extends \yii\db\ActiveRecord
{
    public $image;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'articles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'slug'], 'required'],
            [['slug'], 'unique'],
            [['text', 'subtitle'], 'string'],
            [['created_at'], 'safe'],
            [['enabled'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['image'], 'file', 'extensions' => 'jpeg, gif, png, jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slug' => 'URL',
            'title' => 'Назва',
            'subtitle' => 'Передмова',
            'text' => 'Текст',
            'created_at' => 'Створена',
            'enabled' => 'Ввімкнена',
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'updatedAtAttribute' => false,
                'value' => new Expression('NOW()'),
            ],
            [
                'class' => ArImageBehavior::class,
                'filePath' => '@webroot/uploads/articles/[[basename]]',
                'fileUrl' => '/uploads/articles/[[basename]]',
            ],

        ];
    }
}
