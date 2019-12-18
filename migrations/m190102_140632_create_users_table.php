<?php

use yii\db\Migration;

/**
 * Handles the creation of table `users`.
 */
class m190102_140632_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'idAddress' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'email' => $this->string()->notNull()->unique(),
            'password' => $this->string()->notNull(),
        ]);
        $this->addForeignKey('fk_user_address', 'users', 'idAddress', 'Addresses', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_user_address', 'users');
        $this->dropTable('users');
    }
}
