<?php

use pantera\news\common\models\News;
use yii\web\View;

/* @var $this View */
/* @var $model News */
?>
<div class="news-teaser">
    <?php if ($model->media && $model->media->issetMedia()): ?>
        <div class="news-teaser__l">
            <div class="news-teaser-image image">
                <a href="<?= $model->getUrl() ?>">
                    <img src="<?= $model->media->image(270, 200, false) ?>" alt="">
                </a>
            </div>
        </div>
    <?php endif; ?>
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
