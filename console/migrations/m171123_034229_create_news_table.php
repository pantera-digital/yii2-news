<?php

use yii\db\Migration;

/**
 * Handles the creation of table `news`.
 */
class m171123_034229_create_news_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        if ($this->db->schema->getTableSchema('news', true) === null) {
            $this->createTable('news', [
                'id' => $this->primaryKey(),
                'title' => $this->string()->notNull(),
                'announcement' => $this->string()->null(),
                'text' => $this->text()->notNull(),
                'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            ]);
        }
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        if ($this->db->schema->getTableSchema('news', true) === null) {
            $this->dropTable('news');
        }
    }
}
