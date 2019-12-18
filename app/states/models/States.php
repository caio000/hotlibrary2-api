<?php

namespace app\states\models;

use yii\db\ActiveRecord;
use app\cities\models\City;

class States extends ActiveRecord
{

    public function rules()
    {
      return [
        ['name', 'required'],
        ['name','string', 'max' => 100],
        ['initials', 'required'],
        ['initials', 'string', 'length' => 2]
      ];
    }

    public function getCities()
    {
        return $this->hasMany(City::className(), ['id' => 'idState']);
    }
}
