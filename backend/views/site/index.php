<?php
/* @var $this yii\web\View */
use kartik\file\FileInput;
use yii\helpers\Url;
$this->title = 'My Yii Application';
?>
<?php
    echo FileInput::widget([
    'name' => 'attachment_48[]',
    'options'=>[
    'multiple'=>true
    ],
    'pluginOptions' => [
    'uploadUrl' => Url::to(['/image']),
    'uploadExtraData' => [
    'album_id' => 20,
    'cat_id' => 'Nature'
    ],
    'maxFileCount' => 10
    ]
    ]);

?>
</div>
