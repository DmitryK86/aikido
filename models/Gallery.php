<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\web\UploadedFile;

/**
 * This is the model class for table "gallery".
 *
 * @property int $id
 * @property string $slug
 * @property string $title
 * @property string $created_at
 * @property int $enabled
 * @property array $images
 *
 * @property GalleryItems[] $galleryItems
 */
class Gallery extends \yii\db\ActiveRecord
{
    public $images;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gallery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'slug'], 'required'],
            [['created_at', 'images'], 'safe'],
            [['enabled'], 'boolean'],
            [['title', 'slug'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'slug' => Yii::t('app', 'URL'),
            'title' => Yii::t('app', 'Назва'),
            'created_at' => Yii::t('app', 'Створено'),
            'enabled' => Yii::t('app', 'Ввімкнена'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGalleryItems()
    {
        return $this->hasMany(GalleryItems::className(), ['gallery_id' => 'id']);
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'updatedAtAttribute' => false,
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    public function beforeSave($insert)
    {
        if ($this->images){
            $this->images = UploadedFile::getInstances($this, 'images');
        }

        return parent::beforeSave($insert);
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        $transaction = Yii::$app->db->beginTransaction();
        try{
            foreach ($this->images as $image){
                $item = new GalleryItems();
                $item->gallery_id = $this->id;
                $item->image = $image;
                if (!$item->save()){
                    throw new \Exception('Saving error. Details: ' . json_encode($item->getErrors(), JSON_PRETTY_PRINT));
                }
            }

            $transaction->commit();
        }
        catch (\Throwable $e){
            $transaction->rollBack();
            $this->addError('images', $e->getMessage());
        }
    }

    public function getMainImage(){
        $main = $this->getGalleryItems()->andWhere('is_main = TRUE')->one();
        if (!$main){
            $main = $this->getGalleryItems()->one();
        }

        if (!$main){
            $main = new GalleryItems();
        }


        return $main;
    }

    public function getImages(){
        return $this->getGalleryItems()->all();
    }
}
