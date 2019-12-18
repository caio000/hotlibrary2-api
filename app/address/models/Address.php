<?php

namespace app\address\models;

use yii\db\ActiveRecord;
use app\user\models\User;
use app\zipcodes\models\Zipcode;

class Address extends ActiveRecord
{
    public static function tableName()
    {
      return 'Addresses';
    }

    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'idAddress']);
    }

    public function getZipcode()
    {
        return $this->hasOne(Zipcode::className(), ['idAddress' => 'id']);
    }
}
