<?php

class LoginCest
{
    public $user;
    public $password = '12345678';

    public function _before(FunctionalTester $I)
    {
        $this->user = factory(App\Models\User::class, 'user')->create([
            'password' => bcrypt($this->password),
        ]);
    }

    public function loginAsRegularUser(FunctionalTester $I)
    {
        $I->wantTo('log in to site with right password');
        $I->amOnRoute('login');
        $I->fillField(['name'=>'email'], $this->user->email);
        $I->fillField(['name'=>'password'], $this->password);
        $I->click('.signin_btn');
        $I->seeCurrentRouteIs('root');
        $I->seeResponseCodeIs(200);
    }

    public function loginAsUnregularUser(FunctionalTester $I)
    {
        $I->wantTo('log in to site with wrong password');
        $I->amOnRoute('login');
        $I->fillField(['name'=>'email'], $this->user->email);
        $I->fillField(['name'=>'password'], '0000');
        $I->click('.signin_btn');
        $I->seeCurrentRouteIs('login');
        $I->seeFormHasErrors();
        $I->seeResponseCodeIs(200);
    }
}
