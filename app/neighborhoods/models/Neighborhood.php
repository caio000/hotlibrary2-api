<?php

namespace app\neighborhoods\models;

use yii\db\ActiveRecord;
use app\cities\models\City;
use app\zipcodes\models\Zipcode;

class Neighborhood extends ActiveRecord
{
  public static function tableName()
  {
    return 'Neighborhoods';
  }

  public function rules()
  {
    return [
      ['name', 'string', 'max' => 150],
      ['id', 'integer'],
      ['idCity', 'integer'],
    ];
  }

  function beforeSave($insert)
  {
    if (!parent::beforeSave($insert)) {
      return false;
    }

    $neighborhood = self::find()->where(['name' => $this->name])->one();
    if ($neighborhood) {
      return false;
    }

    return true;
  }

  public function getCity()
  {
    return $this->hasOne(City::className(), ['id' => 'idCity']);
  }

  public function getZipcode()
  {
    return $this->hasOne(Zipcode::className(), ['idNeighborhood' => 'id']);
  }
}
