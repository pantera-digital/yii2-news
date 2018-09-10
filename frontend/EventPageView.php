<?php
/**
 * Created by PhpStorm.
 * User: singletonn
 * Date: 9/10/18
 * Time: 1:52 PM
 */

namespace pantera\news\frontend;


use pantera\news\common\models\News;
use yii\base\Event;

class EventPageView extends Event
{
    /* @var News */
    public $model;
}