<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model pantera\news\common\models\News */

$this->title = 'Обновить: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="news-update">

    <?php if (!Yii::$app->request->isAjax): ?>
        <h1><?= Html::encode($this->title) ?></h1>
    <?php endif ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
