<?php

namespace pantera\news\common\models;

use common\modules\media\behaviors\MediaUploadBehavior;
use common\modules\media\models\Media;
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
            'file' => 'Картинка'
        ];
    }
}
