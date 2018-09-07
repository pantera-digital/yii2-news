<?php

namespace pantera\news\frontend;

class Module extends \yii\base\Module
{
    /* @var string Название пресета seo модуля для просмотра новости */
    public $seoPresentNameView = 'newsView';
    /* @var string Название пресета seo модуля для просмотра списка новостей */
    public $seoPresentNameList = 'newsList';
}