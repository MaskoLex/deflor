<?php
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\helpers\Url;
use yii\helpers\FileHelper;
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
<?= $form->field($model, 'img[]')->label(false)->widget(FileInput::classname(), [
    'options' => ['multiple' => true],
    'pluginOptions' => [
        'uploadUrl' => Url::to(['/site/upload']),
        'uploadExtraData' => [
//            'album_id' => 20,
 //           'cat_id' => 'Nature'
        ],
        'maxFileCount' => 10
    ]
]); ?>
<?php ActiveForm::end() ?>
