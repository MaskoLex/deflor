<?php
namespace frontend\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $img;

    public function rules()
    {
        return [
            [['img'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg','maxFiles' => 4],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            foreach ($this->img as $file) {
                $file->saveAs('img/' . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }
}