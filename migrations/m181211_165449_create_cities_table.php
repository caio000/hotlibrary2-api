<?php

use yii\db\Migration;

/**
 * Handles the creation of table `cities`.
 */
class m181211_165449_create_cities_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('cities', [
            'id' => $this->primaryKey(),
            'idState' => $this->integer()->notNull(),
            'name' => $this->string(200)->notNull(),
        ]);

        $this->addForeignKey('fk_city_state','cities','idState','states','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_city_state', 'cities');
        $this->dropTable('cities');
    }
}
