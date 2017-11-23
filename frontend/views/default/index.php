<?php

use yii\data\ActiveDataProvider;
use yii\widgets\ListView;

/* @var $dataProvider ActiveDataProvider */
$this->title = 'Новости';
$this->params['breadcrumbs'][] = 'Новости';
?>

<h1>Все новости</h1>
<div class="popular-searches popular-searches-news">
    <a href="javascript:void(0)" class="badge-category">Все</a>
    <a href="javascript:void(0)" class="badge-category">Отдых</a>
    <a href="javascript:void(0)" class="badge-category">Советы</a>
    <a href="javascript:void(0)" class="badge-category">Лагеря</a>
    <a href="javascript:void(0)" class="badge-category">Акции</a>
    <a href="javascript:void(0)" class="badge-category">Новости</a>
</div>
<?= ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
    'summary' => false,
]) ?>
