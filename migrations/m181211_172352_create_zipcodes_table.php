<?php

use yii\db\Migration;

/**
 * Handles the creation of table `zipcodes`.
 */
class m181211_172352_create_zipcodes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('zipcodes', [
            'id' => $this->primaryKey(),
            'idNeighborhood' => $this->integer()->notNull(),
            'number' => $this->string(8)->notNull()->unique(),
        ]);
        $this->addForeignKey('fk_zipcode_neighborhood', 'zipcodes', 'idNeighborhood', 'neighborhoods', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_zipcode_neighborhood', 'zipcodes');
        $this->dropTable('zipcodes');
    }
}
