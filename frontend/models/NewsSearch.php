<?php

namespace pantera\news\frontend\models;

use pantera\news\common\models\News;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class NewsSearch extends News
{

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search()
    {
        $query = News::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => ['created_at' => SORT_DESC]
            ],
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        return $dataProvider;
    }

    /**
     * Поиск новостей кроме переданного идентификатора
     * @param integer $id
     * @return ActiveDataProvider
     */
    public function searchOther($id)
    {
        $query = News::find()
            ->where(['!=', 'id', $id])
            ->limit(4);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
            'sort' => [
                'defaultOrder' => ['id' => SORT_DESC]
            ]
        ]);
        return $dataProvider;
    }
}
