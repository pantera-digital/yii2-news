<?php

use yii\data\ActiveDataProvider;
use yii\widgets\ListView;

/* @var $dataProvider ActiveDataProvider */
$this->title = 'Новости';
$this->params['breadcrumbs'][] = 'Новости';
?>

<h1>Все новости</h1>
<?= ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
    'summary' => false,
]) ?>
