<?php

use yii\db\Migration;

/**
 * Class m181211_162050_insert_states_table
 */
class m181211_162050_insert_states_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $states = [
        ['Acre', 'AC'],
        ['Alagoas', 'AL'],
        ['Amapá', 'AP'],
        ['Amazonas', 'AM'],
        ['Bahia', 'BA'],
        ['Ceará', 'CE'],
        ['Distrito Federal', 'DF'],
        ['Espírito Santo', 'ES'],
        ['Goiás','GO'],
        ['Maranhão','MA'],
        ['Mato Grosso','MT'],
        ['Mato Grosso do Sul','MS'],
        ['Minas Gerais','MG'],
        ['Pará','PA'],
        ['Paraíba','PB'],
        ['Paraná','PR'],
        ['Pernambuco','PE'],
        ['Piauí','PI'],
        ['Rio de Janeiro','RJ'],
        ['Rio Grande do Norte','RN'],
        ['Rio Grande do Sul','RS'],
        ['Rondônia','RO'],
        ['Rorâima','RR'],
        ['Santa Catarina', 'SC'],
        ['São Paulo', 'SP'],
        ['Sergipe', 'SE'],
        ['Tocantins', 'TO']
      ];

      $this->batchInsert('states', ['name', 'initials'], $states);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181211_162050_insert_states_table cannot be reverted.\n";
        $this->truncateTable('states');
        return true;
    }
}
