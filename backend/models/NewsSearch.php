<?php

namespace pantera\news\backend\models;

use pantera\news\common\models\News;
use yii\data\ActiveDataProvider;

class NewsSearch extends News
{
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['created_at', 'title', 'announcement', 'text'], 'safe'],
        ];
    }

    public function search($params)
    {
        $query = News::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => ['created_at' => SORT_DESC]
            ]
        ]);
        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }
        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
        ]);
        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'announcement', $this->announcement])
            ->andFilterWhere(['like', 'text', $this->text]);
        return $dataProvider;
    }
}
