<?php

namespace pantera\news\frontend;

class Module extends \yii\base\Module
{
    /* @var string Событие перед рендерингом списка новостей */
    const EVENT_LIST_VIEW = 'eventListView';
    /* @var string Событие перед рендерингом просмотра новости */
    const EVENT_PAGE_VIEW = 'eventPageView';
}