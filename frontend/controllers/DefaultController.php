<?php

namespace pantera\news\frontend\controllers;

use pantera\news\common\models\News;
use pantera\news\frontend\EventPageView;
use pantera\news\frontend\models\NewsSearch;
use pantera\news\frontend\Module;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class DefaultController extends Controller
{
    /* @var Module */
    public $module;

    /**
     * Просмотр списка новостей по тегу
     * @return string
     */
    public function actionTag()
    {
        $searchModel = new NewsSearch();
        $searchModel->tag = Yii::$app->request->get('tag');
        $dataProvider = $searchModel->search();
        $this->view->title = 'Все новости - страница ' . Yii::$app->request->get('page', 1);
        $this->module->trigger($this->module::EVENT_LIST_VIEW);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Просмотр списка новостей
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search();
        $this->view->title = 'Все новости - страница ' . Yii::$app->request->get('page', 1);
        $this->module->trigger($this->module::EVENT_LIST_VIEW);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Просмотр конкретной новости
     * @param integer $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->searchOther($id);
        $this->view->title = $model->title;
        $this->module->trigger($this->module::EVENT_PAGE_VIEW, new EventPageView(['model' => $model]));
        return $this->render('view', [
            'model' => $model,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @param integer $id
     * @return News
     * @throws NotFoundHttpException
     */
    private function findModel($id)
    {
        $model = News::findOne($id);
        if (is_null($model)) {
            throw new NotFoundHttpException();
        }
        return $model;
    }
}
