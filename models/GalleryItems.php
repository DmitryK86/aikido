<?php

namespace app\models;

use app\behaviors\ArImageBehavior;
use Yii;

/**
 * This is the model class for table "gallery_items".
 *
 * @property int $id
 * @property int $gallery_id
 * @property string $comment
 * @property int $is_main
 * @property string $image
 *
 * @property Gallery $gallery
 */
class GalleryItems extends \yii\db\ActiveRecord
{
    public $image;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gallery_items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gallery_id'], 'required'],
            [['gallery_id'], 'integer'],
            [['is_main'], 'boolean'],
            [['comment'], 'string', 'max' => 255],
            [['gallery_id'], 'exist', 'skipOnError' => true, 'targetClass' => Gallery::className(), 'targetAttribute' => ['gallery_id' => 'id']],
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
            'gallery_id' => 'Gallery ID',
            'comment' => 'Comment',
            'is_main' => 'Is Main',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGallery()
    {
        return $this->hasOne(Gallery::className(), ['id' => 'gallery_id']);
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => ArImageBehavior::class,
                'filePath' => "@webroot/uploads/{$this->gallery_id}/[[basename]]",
                'fileUrl' => "/uploads/{$this->gallery_id}/[[basename]]",
            ],

        ];
    }

    public static function changeMainPhoto($galleryId, $itemId){
        self::updateAll(['is_main' => false], 'gallery_id = :galleryId', [':galleryId' => $galleryId]);
        $item = self::findOne($itemId);
        $item->is_main = true;

        return $item->update();
    }
}
