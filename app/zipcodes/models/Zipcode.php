<?php

namespace app\zipcodes\models;

use yii\db\ActiveRecord;
use app\neighborhoods\models\Neighborhood;
use app\address\models\Address;

class Zipcode extends ActiveRecord
{

    public static function tableName()
    {
      return 'zipcodes';
    }

    public function beforeSave($insert)
    {
      if (!parent::beforeSave($insert)) {
        return false;
      }

      $zipcode = self::find()->where(['number' => $this->number])->one();
      if ($zipcode) {
        return false;
      }

      return true;
    }

    public function getNeighborhood()
    {
        return $this->hasOne(Neighborhood::className(), ['id' => 'idNeighborhood']);
    }

    public function getAddress()
    {
      return $this->hasOne(Address::className(), ['idZipcode' => 'id']);
    }
}
