<?php

namespace app\user\controllers;

use Yii;
use Exception;
use app\user\models\User;
use app\address\models\Address;
use app\cities\models\City;
use app\neighborhoods\models\Neighborhood;
use app\zipcodes\models\Zipcode;

class UsersController extends \app\lib\yii\rest\ActiveController
{
    public $modelClass = 'app\user\models\User';

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['create']);
        return $actions;
    }

    public function actionCreate()
    {
        $connection = Yii::$app->db;
        $transaction = $connection->beginTransaction();
        $request = Yii::$app->request->post();
        $security = Yii::$app->getSecurity();

        try{

            $city = new City;
            $city->idState = $request['address']['state']['id'];
            $city->name = $request['address']['city'];
            if (!$city->save()) {
                $city = City::find()->where(['name' => $city->name])->one();
            }

            $neighborhood = new Neighborhood;
            $neighborhood->idCity = $city->id;
            $neighborhood->name = $request['address']['neighborhood'];
            if (!$neighborhood->save()) {
                $neighborhood = Neighborhood::find()->where(['name'=>$neighborhood->name])->one();
            }

            $zipcode = new Zipcode;
            $zipcode->idNeighborhood = $neighborhood->id;
            $zipcode->number = $request['address']['zipcode'];
            if (!$zipcode->save()) {
                $zipcode = Zipcode::find()->where(['number' => $zipcode->number])->one();
            }

            $address = new Address;
            $address->idZipcode = $zipcode->id;
            $address->publicPlace = $request['address']['publicplace'];
            $address->number = $request['address']['number'];
            $address->save();

            $user = new User;
            $user->idAddress = $address->id;
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->password = $security->generatePasswordHash($request['password']);
            $user->save();

            $transaction->commit();
        } catch (Exception $e) {
            $transaction->rollBack();
        }

        return $user;
    }
}
