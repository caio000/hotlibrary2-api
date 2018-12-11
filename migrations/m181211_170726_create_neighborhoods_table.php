<?php

use yii\db\Migration;

/**
 * Handles the creation of table `neighborhoods`.
 */
class m181211_170726_create_neighborhoods_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('neighborhoods', [
            'id' => $this->primaryKey(),
            'idCity' => $this->integer()->notNull(),
            'name' => $this->string(150)->notNull()
        ]);

        $this->addForeignKey('fk_neighborhood_city', 'neighborhoods', 'idCity', 'cities', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_neighborhood_city', 'neighborhoods');
        $this->dropTable('neighborhoods');
    }
}
