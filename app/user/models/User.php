<?php

namespace app\user\models;

use yii\db\ActiveRecord;
use app\address\models\Address;

class User extends ActiveRecord
{
    public static function tableName()
    {
        return 'users';
    }

    public function rules()
    {
      return [
        ['name', 'required'],
        ['idAddress', 'required'],
        ['email', 'required'],
        ['password', 'required']
      ];
    }

    public function getAddress()
    {
        return $this->hasOne(Address::className(), ['idAddress' => 'id']);
    }

}
