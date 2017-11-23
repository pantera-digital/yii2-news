<?php

use pantera\news\common\models\News;
use yii\data\ActiveDataProvider;
use yii\widgets\ListView;

/* @var $model News */
/* @var $dataProvider ActiveDataProvider */
$this->title = $model->title . ' - Новости KID.Travel';
$this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->title;
?>

<div class="news">
    <div class="news-date"><?= Yii::$app->formatter->asDate($model->created_at) ?></div>
    <h1><?= $model->title ?></h1>
    <div class="news-description">
        <?= $model->text ?: $model->announcement ?>
    </div>
    <div class="social-likes social-likes-panel" data-counters="no">
        <div class="vkontakte" title="Поделиться ссылкой во Вконтакте">Вконтакте</div>
        <div class="facebook" title="Поделиться ссылкой на Фейсбуке">Facebook</div>
        <div class="plusone" title="Поделиться ссылкой в Гугл-плюсе">Google+</div>
    </div>
</div>
<div class="news-more-block">
    <div class="header h3">Другие новости</div>
    <div class="row">
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_small_view',
            'summary' => false,
            'itemOptions' => [
                'class' => 'col-lg-6 col-md-6 col-sm-12 col-xs-12',
            ],
        ]) ?>
    </div>
</div>
