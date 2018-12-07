<?php
namespace frontend\models;

use yii\base\Model;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $img;

    public function rules()
    {
        return [
            [['img'], 'image', 'skipOnEmpty' => false, 'extensions' => 'png, jpg','maxFiles' => 50],
        ];
    }
/*
    public function upload($catalog)
    {
        if ($this->validate()) {
            FileHelper::createDirectory('img/'.$catalog);
            foreach ($this->img as $file) {
                $file->saveAs('img/'.$catalog.'/'. $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }
*/

}