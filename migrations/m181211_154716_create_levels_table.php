<?php

use yii\db\Migration;

/**
 * Handles the creation of table `levels`.
 */
class m181211_154716_create_levels_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('levels', [
            'id' => $this->primaryKey(),
            'type' => $this->string(100)->notNull()->unique()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('levels');
    }
}
