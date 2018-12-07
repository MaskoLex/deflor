<?php

namespace app\models;

use Yii;
use yii\helpers\FileHelper;

/**
 * This is the model class for table "images".
 *
 * @property int $id_img
 * @property string $url_img
 * @property string $url_300*350_img
 * @property string $type
 * @property string $parent_img
 */
class Images extends \yii\db\ActiveRecord
{
    public $images;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['images'], 'image', 'skipOnEmpty' => false, 'extensions' => 'png, jpg','maxFiles' => 50],
            [['url_img', 'url_300*350_img', 'type', 'parent_img'], 'required'],
            [['url_img', 'url_300*350_img'], 'string', 'max' => 1000],
            [['type'], 'string', 'max' => 5],
            [['parent_img'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     * @param string $category the target email address
     *
     */
    public static function getRandomFileName($path, $extension)
    {
        do {
            $name = md5(microtime() . rand(0, 9999));
            $file = $path .'/'. $name . '.'.$extension;
        } while (file_exists($file));
        return $name.'.'.$extension;
    }

    public function upload($category) {
        if($this->validate()){
            $path = 'images/'.$category;
            FileHelper::createDirectory($path);
            foreach ($this->images as $file){
                $file->saveAs( $path.'/'.static::getRandomFileName($path,$file->extension));
            }
            return true;
        }else{
            return false;
        }
    }
    public function attributeLabels()
    {
        return [
            'id_img' => 'Id Img',
            'url_img' => 'Url Img',
            'url_300*350_img' => 'Url 300*350 Img',
            'type' => 'Type',
            'parent_img' => 'Parent Img',
        ];
    }
}
