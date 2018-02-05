<?php

namespace pantera\news\common\models;

use common\modules\media\behaviors\MediaUploadBehavior;
use common\modules\media\models\Media;
use creocoder\taggable\TaggableBehavior;
use yii\db\ActiveRecord;
use yii\helpers\Url;
use yii\web\UploadedFile;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $title
 * @property string $announcement
 * @property string $text
 * @property string $created_at
 * @property NewsTag[] $tags
 *
 * @method Media getMedia()
 */
class News extends ActiveRecord
{
    /* @var UploadedFile|null */
    public $file;

    public function behaviors()
    {
        return [
            [
                'class' => MediaUploadBehavior::className(),
                'name' => 'media',
            ],
            'taggable' => [
                'class' => TaggableBehavior::className(),
                'tagValuesAsArray' => true,
            ],
        ];
    }

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
            [['created_at', 'tagValues'], 'safe'],
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
            'file' => 'Картинка',
            'tagValues' => 'Теги',
        ];
    }

    public function getTags()
    {
        return $this->hasMany(NewsTag::className(), ['id' => 'news_tag_id'])
            ->viaTable('news_news_tag', ['news_id' => 'id']);
    }
}
