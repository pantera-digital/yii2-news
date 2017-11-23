<?php

namespace pantera\news\common\models;

use yii\helpers\Url;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $title
 * @property string $announcement
 * @property string $text
 * @property string $created_at
 */
class News extends \yii\db\ActiveRecord
{

    /**
     * Получить ссылку на просмотр новости
     * @return string
     */
    public function getUrl()
    {
        return Url::to(['/news/default/view', 'id' => $this->id]);
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'text'], 'required'],
            [['text'], 'string'],
            [['title', 'announcement'], 'string', 'max' => 250],
            [['created_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'announcement' => 'Анонс',
            'text' => 'Текст',
            'created_at' => 'Дата',
        ];
    }
}
