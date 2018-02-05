<?php

use yii\db\Migration;

/**
 * Handles the creation of table `news_news_tag`.
 * Has foreign keys to the tables:
 *
 * - `news`
 * - `news_tag`
 */
class m180205_062834_create_junction_table_for_news_and_news_tag_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->execute('ALTER TABLE news ENGINE = InnoDB;');
        $this->createTable('news_news_tag', [
            'news_id' => $this->integer()->unsigned(),
            'news_tag_id' => $this->integer(),
            'PRIMARY KEY(news_id, news_tag_id)',
        ]);

        // creates index for column `news_id`
        $this->createIndex(
            'idx-news_news_tag-news_id',
            'news_news_tag',
            'news_id'
        );

        // add foreign key for table `news`
        $this->addForeignKey(
            'fk-news_news_tag-news_id',
            'news_news_tag',
            'news_id',
            'news',
            'id',
            'CASCADE'
        );

        // creates index for column `news_tag_id`
        $this->createIndex(
            'idx-news_news_tag-news_tag_id',
            'news_news_tag',
            'news_tag_id'
        );

        // add foreign key for table `news_tag`
        $this->addForeignKey(
            'fk-news_news_tag-news_tag_id',
            'news_news_tag',
            'news_tag_id',
            'news_tag',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `news`
        $this->dropForeignKey(
            'fk-news_news_tag-news_id',
            'news_news_tag'
        );

        // drops index for column `news_id`
        $this->dropIndex(
            'idx-news_news_tag-news_id',
            'news_news_tag'
        );

        // drops foreign key for table `news_tag`
        $this->dropForeignKey(
            'fk-news_news_tag-news_tag_id',
            'news_news_tag'
        );

        // drops index for column `news_tag_id`
        $this->dropIndex(
            'idx-news_news_tag-news_tag_id',
            'news_news_tag'
        );

        $this->dropTable('news_news_tag');
    }
}
