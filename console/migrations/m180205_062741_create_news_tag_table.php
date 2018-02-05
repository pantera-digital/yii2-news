<?php

use yii\db\Migration;

/**
 * Handles the creation of table `news_tag`.
 */
class m180205_062741_create_news_tag_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('news_tag', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'frequency' => $this->integer()->notNull()->defaultValue(0),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('news_tag');
    }
}
