<?php

use Codeception\Util\HttpCode;

class StatesCest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
      $I->sendGET('/states');
      $I->seeResponseCodeIs(HttpCode::OK); // 200
      $I->seeResponseIsJson();
    }
}
