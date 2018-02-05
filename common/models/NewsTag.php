<?php

namespace pantera\news\common\models;

use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/**
 * This is the model class for table "news_tag".
 *
 * @property int $id
 * @property string $name
 * @property int $frequency
 *
 * @property NewsNewsTag[] $newsNewsTags
 * @property News[] $news
 */
class NewsTag extends \yii\db\ActiveRecord
{
    /**
     * @param bool $map
     * @return array|\yii\db\ActiveRecord[]|BlogTags[]
     */
    public static function getList($map = true)
    {
        $models = self::find()->all();
        if ($map) {
            return ArrayHelper::map($models, 'name', 'name');
        }
        return $models;
    }

    /**
     * Получить ссылку на список новостей по этому тегу
     * @return string
     */
    public function getUrl()
    {
        return Url::to([
            '/news/default/tag',
            'tag' => $this->name
        ]);
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news_tag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['frequency'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'frequency' => 'Частота',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNewsNewsTags()
    {
        return $this->hasMany(NewsNewsTag::className(), ['news_tag_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasMany(News::className(), ['id' => 'news_id'])->viaTable('news_news_tag', ['news_tag_id' => 'id']);
    }
}
