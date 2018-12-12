<?php

namespace app\lib\yii\rest;

use Yii;
use yii\web\Response;
use yii\filters\ContentNegotiator;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\Cors;

class ActiveController extends \yii\rest\ActiveController
{
  public function behaviors()
  {
      return [
          [
              'class' => ContentNegotiator::className(),
              'formats' => [
                  'application/json' => Response::FORMAT_JSON,
              ],
          ],
          'corsFilter' => [
            'class' => Cors::className(),
          ],
      ];
  }
}
