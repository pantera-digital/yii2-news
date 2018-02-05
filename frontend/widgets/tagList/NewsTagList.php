<?php
/**
 * Created by PhpStorm.
 * User: singletonn
 * Date: 2/5/18
 * Time: 4:52 PM
 */

namespace pantera\news\frontend\widgets\tagList;

use pantera\news\common\models\NewsTag;
use yii\base\Widget;

class NewsTagList extends Widget
{
    public function run()
    {
        parent::run();
        $models = NewsTag::find()
            ->all();
        if ($models) {
            return $this->render('index', [
                'models' => $models,
            ]);
        }
    }
}