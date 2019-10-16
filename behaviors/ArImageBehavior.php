<?php
namespace app\behaviors;

use app\helpers\ImageHelper;
use app\models\Images;
use yii\base\Exception;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;
use yiidreamteam\upload\ImageUploadBehavior;
use \Yii;

class ArImageBehavior extends ImageUploadBehavior
{
    public $createThumbsOnSave = false;

    public $thumbPath = '@webroot/uploads/thumbs/[[basename]]';
    public $thumbUrl = '/uploads/thumbs/[[basename]]';

    public $filePath = '@webroot/uploads/[[basename]]';
    public $fileUrl = '/uploads/[[basename]]';
    /** @var Images $_image */
    private $_image = -1;

    public function beforeValidate()
    {
        if (!class_exists(Images::class)){
            throw new Exception('Model "Images" does not exist');
        }

        if (\Yii::$app->db->getTableSchema(Images::tableName(), true) === false){
            throw new Exception('Table "images" does not exist');
        }

        return parent::beforeValidate();
    }

    public function beforeSave()
    {
        if ($this->file instanceof UploadedFile) {

            if (!$this->getImageModel()) {
                $this->_image = new Images();
                $this->_image->model_id = $this->owner->primaryKey;
                $this->_image->model_schema = $this->owner::tableName();
            }

            $this->_image->filename = implode('.',
                array_filter([$this->file->baseName, $this->file->extension])
            );
        }
    }

    public function afterSave()
    {
        if ($this->_image instanceof Images){
            if (empty($this->_image->model_id)){
                $this->_image->model_id = $this->owner->getPrimaryKey();
            }
            if (!$this->_image->save()){
                throw new Exception('Image model saving error. Details: ' . json_encode($this->_image->getErrors(), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            }
        }

        return parent::afterSave();
    }

    public function getImageFileUrl($attribute, $emptyUrl = null)
    {
        if (!$this->getImageModel()) {
            return $emptyUrl;
        }

        return $this->getUploadedFileUrl($attribute);
    }

    public function getImageSrc($emptyUrl = ImageHelper::EMPTY_IMG_SRC){
        return $this->getImageFileUrl($this->attribute, $emptyUrl);
    }

    /**
     * Replaces all placeholders in path variable with corresponding values
     *
     * @param string $path
     * @return string
     */
    public function resolvePath($path)
    {
        $path = Yii::getAlias($path);

        $pi = pathinfo($this->_image->filename);
        $fileName = ArrayHelper::getValue($pi, 'filename');
        $extension = strtolower(ArrayHelper::getValue($pi, 'extension'));

        return preg_replace_callback('|\[\[([\w\_/]+)\]\]|', function ($matches) use ($fileName, $extension) {
            $name = $matches[1];
            switch ($name) {
                case 'extension':
                    return $extension;
                case 'filename':
                    return $fileName;
                case 'basename':
                    return implode('.', array_filter([$fileName, $extension]));
                case 'app_root':
                    return Yii::getAlias('@app');
                case 'web_root':
                    return Yii::getAlias('@webroot');
                case 'base_url':
                    return Yii::getAlias('@web');
                case 'model':
                    $r = new \ReflectionClass($this->owner->className());
                    return lcfirst($r->getShortName());
                case 'attribute':
                    return lcfirst($this->attribute);
                case 'id':
                case 'pk':
                    $pk = implode('_', $this->owner->getPrimaryKey(true));
                    return lcfirst($pk);
                case 'id_path':
                    return static::makeIdPath($this->owner->getPrimaryKey());
                case 'parent_id':
                    return $this->owner->{$this->parentRelationAttribute};
            }
            if (preg_match('|^attribute_(\w+)$|', $name, $am)) {
                $attribute = $am[1];
                return $this->owner->{$attribute};
            }
            if (preg_match('|^md5_attribute_(\w+)$|', $name, $am)) {
                $attribute = $am[1];
                return md5($this->owner->{$attribute});
            }
            return '[[' . $name . ']]';
        }, $path);
    }

    private function getImageModel(){
        if ($this->_image === -1){
            $this->_image = Images::findOne([
                'model_id' => $this->owner->primaryKey,
                'model_schema' => $this->owner::tableName()
            ]);
        }

        return $this->_image;
    }


}
