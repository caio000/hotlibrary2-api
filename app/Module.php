<?php

namespace app;

use yii\base\Module as YiiModule;

class Module extends YiiModule
{
    public function init()
    {
        $this->controllerMap = [
            'users' => 'app\user\controllers\UsersController',
            'states' => 'app\states\controllers\StatesController',
        ];
        parent::init();
    }
}
