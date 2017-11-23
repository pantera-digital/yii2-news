<?php

use pantera\news\common\models\News;
use yii\web\View;

/* @var $this View */
/* @var $model News */
?>
<div class="news-teaser">
    <div class="news-teaser__l">
        <div class="news-teaser-image image">
            <a href="<?= $model->getUrl() ?>">
                <img src="/img/v2/i40.jpg" alt="">
            </a>
        </div>
    </div>
    <div class="news-teaser__r">
        <div class="news-date"><?= Yii::$app->formatter->asDate($model->created_at) ?></div>
        <div class="news-teaser-title">
            <a href="<?= $model->getUrl() ?>">
                <?= $model->title ?>
            </a>
        </div>
        <div class="news-description">
            <?= $model->announcement ?>
        </div>
    </div>
</div>
