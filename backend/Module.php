<?php

namespace pantera\news\backend;

use yii\base\Event;
use yii\bootstrap\Nav;

class Module extends \yii\base\Module
{
	public function init() {
		Event::on(Nav::className(), Nav::EVENT_INIT, function ($e) {
		    $nav = $e->sender;
		    if ($nav->id == 'admin-main-nav') {
		    	$nav->items[] = ['label' => 'News', 'url' => ['/news']];
		    }
		});
		parent::init();
	}
}