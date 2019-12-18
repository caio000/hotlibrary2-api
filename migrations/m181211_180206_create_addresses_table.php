<?php

use yii\db\Migration;

/**
 * Handles the creation of table `addresses`.
 */
class m181211_180206_create_addresses_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('addresses', [
            'id' => $this->primaryKey(),
            'idZipcode' => $this->integer()->notNull(),
            'publicPlace' => $this->string(250),
            'number' => $this->smallInteger(),
        ]);
        $this->addForeignKey('fk_address_zipcode', 'addresses', 'idZipcode', 'zipcodes', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_address_zipcode', 'addresses');
        $this->dropTable('addresses');
    }
}
