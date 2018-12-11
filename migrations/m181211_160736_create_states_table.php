<?php

use yii\db\Migration;

/**
 * Handles the creation of table `states`.
 */
class m181211_160736_create_states_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('states', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'initials' => $this->string(2)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('states');
    }
}
