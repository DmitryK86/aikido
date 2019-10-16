<?php

namespace app\models;

use app\behaviors\ArImageBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "blog_items".
 *
 * @property int $id
 * @property string $slug
 * @property string $title
 * @property string $text
 * @property string $created_at
 * @property int $enabled
 * @property string $image
 */
class BlogItems extends \yii\db\ActiveRecord
{
    public $image;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog_items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['slug', 'title'], 'required'],
            [['text'], 'string'],
            [['created_at'], 'safe'],
            [['enabled'], 'integer'],
            [['slug', 'title'], 'string', 'max' => 255],
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
                'filePath' => '@webroot/uploads/blog/[[basename]]',
                'fileUrl' => '/uploads/blog/[[basename]]',
            ],

        ];
    }
}
