<?php

namespace app\states\controllers;

use yii\data\ActiveDataProvider;
use app\lib\yii\rest\ActiveController;
use app\states\models\States;

class StatesController extends activeController
{
  public $modelClass = 'app\states\models\States';

  public function actions()
  {
    $actions = parent::actions();
    unset($actions['index']);
    return $actions;
  }

  public function actionIndex()
  {
    $activeDataProvider = new ActiveDataProvider([
      'query' => States::find(),
      'pagination' => false,
    ]);
    return $activeDataProvider;
  }

}
