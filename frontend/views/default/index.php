<?php

use pantera\news\frontend\widgets\tagList\NewsTagList;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\ListView;

/* @var $dataProvider ActiveDataProvider */
/* @var $this View */
$this->params['breadcrumbs'][] = 'Новости';
if (Yii::$app->request->get('page')) {
    $this->registerLinkTag([
        'rel' => 'canonical',
        'href' => Url::to(['index']),
    ]);
}
?>

<h1>
    <?= Yii::$app->seo->getH1() ?>
</h1>
<?= NewsTagList::widget() ?>
<?= ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
    'summary' => false,
]) ?>
