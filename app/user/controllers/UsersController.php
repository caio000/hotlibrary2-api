<?php

namespace app\user\controllers;

use yii\web\Response;
use yii\filters\ContentNegotiator;

class UsersController extends \app\lib\yii\rest\ActiveController
{
    public $modelClass = 'app\user\models\User';
}
