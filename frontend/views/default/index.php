<?php

use pantera\news\frontend\widgets\tagList\NewsTagList;
use yii\data\ActiveDataProvider;
use yii\widgets\ListView;

/* @var $dataProvider ActiveDataProvider */
$title = 'Новости о детском отдыхе и лагерях - страница ' . Yii::$app->request->get('page', 1);
$this->title = $title;
$this->params['breadcrumbs'][] = 'Новости';
?>

<h1>Все новости</h1>
<?= NewsTagList::widget() ?>
<?= ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
    'summary' => false,
]) ?>
