<?php

namespace app\cities\models;

use yii\db\ActiveRecord;
use app\states\models\States;
use app\neighborhoods\models\Neighborhood;

class City extends ActiveRecord
{

    public static function tableName()
    {
      return 'cities';
    }

    public function rules()
    {
      return [
        ['name', 'string'],
        ['idState', 'integer']
      ];
    }

    function beforeSave($insert)
    {
      if (!parent::beforeSave($insert)) {
        return false;
      }

      $city = self::find()->where(['name' => $this->name])->one();
      if ($city) {
        return false;
      }

      return true;
    }

    function getState()
    {
        return $this->hasOne(States::className(), ['idState' => 'id']);
    }

    public function getNeighborhoods()
    {
        return $this->hasMany(Neighborhood::className(), ['idCity' => 'id']);
    }
}
