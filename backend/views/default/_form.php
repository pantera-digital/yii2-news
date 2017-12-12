<?php

use kartik\widgets\ActiveForm;
use kartik\widgets\FileInput;
use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model pantera\news\common\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin([
        'id' => 'ajax-form',
        'type' => ActiveForm::TYPE_VERTICAL,
    ]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'announcement')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->widget(CKEditor::className(), [
        'editorOptions' => \mihaildev\elfinder\ElFinder::ckeditorOptions(['elfinder', 'path' => 'some/sub/path'], [
            'preset' => 'full',
            'height' => 600
        ]),
    ]); ?>

    <div class="form-group">
        <label class="control-label"><?= $model->getAttributeLabel('file') ?></label>
        <?php
        $eventFileUploaded = <<<JS
    function(e, data, previewId){
        var input = $(e.target);
        $("#" + previewId).find('.media-id').val(data.response.mediaId);
    }
JS;
        $initialPreview = [];
        $initialPreviewConfig = [];
        $initialPreviewThumbTags = [];
        if ($model->getMedia()) {
            $initialPreview[] = $model->getMedia()->image();
            $initialPreviewConfig[] = [
                'caption' => $model->getMedia()->name,
                'size' => $model->getMedia()->size,
                'url' => Url::to(['file-delete', 'id' => $model->id]),
            ];
            $initialPreviewThumbTags[] = [
                'mediaId' => $model->getMedia()->id,
            ];
        }
        echo FileInput::widget([
            'model' => $model,
            'attribute' => 'file',
            'pluginOptions' => [
                'uploadUrl' => Url::to(['file-upload', 'id' => $model->id]),
                'maxFileSize' => 2800,
                'overwriteInitial' => false,
                'initialPreviewAsData' => true,
                'initialPreview' => $initialPreview,
                'initialPreviewConfig' => $initialPreviewConfig,
                'initialPreviewThumbTags' => $initialPreviewThumbTags,
                'otherActionButtons' => '<input type="hidden" name="media" value="mediaId" class="media-id" />',
                'fileActionSettings' => [
                    'showZoom' => false,
                ],
            ],
            'pluginEvents' => [
                'fileuploaded' => new JsExpression($eventFileUploaded),
            ],
        ]);
        ?>
    </div>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
