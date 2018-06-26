<?php

use kartik\widgets\ActiveForm;
use kartik\widgets\FileInput;
use kartik\widgets\Select2;
use mihaildev\ckeditor\CKEditor;
use pantera\news\common\models\NewsTag;
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

    <?= $form->field($model, 'tagValues')->widget(Select2::className(), [
        'data' => NewsTag::getList(),
        'options' => ['placeholder' => 'Выберите теги', 'multiple' => true],
        'pluginOptions' => [
            'tags' => true,
            'tokenSeparators' => [','],
        ],
    ]) ?>

    <?= $form->field($model, 'announcement')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->widget(CKEditor::className(), [
        'editorOptions' => \mihaildev\elfinder\ElFinder::ckeditorOptions(['elfinder', 'path' => 'some/sub/path'], [
            'preset' => 'full',
            'height' => 600
        ]),
    ]); ?>

    <div class="form-group">
        <label class="control-label"><?= $model->getAttributeLabel('file') ?></label>
        <?= pantera\media\widgets\kartik\MediaUploadWidgetKartik::widget([
            'model' => $model,
            'bucket' => 'media',
            'urlUpload' => ['file-upload', 'id' => $model->id],
            'urlDelete' => ['file-delete'],
        ]) ?>
    </div>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
