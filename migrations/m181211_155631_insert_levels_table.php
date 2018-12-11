<?php

use yii\db\Migration;

/**
 * Class m181211_155631_insert_levels_table
 */
class m181211_155631_insert_levels_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $this->batchInsert('levels', ['type'], [
        ['administrador'],
        ['biblioteca'],
        ['comum']
      ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181211_155631_insert_levels_table cannot be reverted.\n";
        $this->truncateTable('levels');
        return true;
    }
}
