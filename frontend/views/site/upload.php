<?php
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'img[]')->widget(FileInput::classname(), [
    'options' => ['multiple' => true],
]); ?>

<?php ActiveForm::end() ?>