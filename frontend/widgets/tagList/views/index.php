<?php
/**
 * Created by PhpStorm.
 * User: singletonn
 * Date: 2/5/18
 * Time: 4:53 PM
 */

use pantera\news\common\models\NewsTag;
use yii\helpers\Url;
use yii\web\View;

/* @var $this View */
/* @var $models NewsTag[] */
$url = Url::to([
    '/news/default/index',
]);
?>
<div class="popular-searches popular-searches-news">
    <a href="<?= $url ?>" class="badge-category">Все</a>
    <?php foreach ($models as $model): ?>
        <a href="<?= $model->getUrl() ?>" class="badge-category">
            <?= $model->name ?>
        </a>
    <?php endforeach; ?>
</div>
