<?php

class AdminAccessCest
{

    public function adminPanelForAdmin(FunctionalTester $I)
    {
        $I->wantTo('get access to admin panel as admin');
        $admin = factory(App\Models\User::class, 'admin')->create();
        $I->amLoggedAs($admin);
        $I->amOnRoute('admin.root');
        $I->seeCurrentRouteIs('admin.root');
        $I->seeResponseCodeIs(200);
    }

    public function adminPanelForNoAdmin(FunctionalTester $I)
    {
        $I->wantTo('get access to admin panel as no admin');
        $user = factory(App\Models\User::class, 'user')->create();
        $I->amLoggedAs($user);
        $I->amOnRoute('admin.root');
        $I->seeResponseCodeIs(403);
    }

    public function adminPanelForNoUser(FunctionalTester $I)
    {
        $I->wantTo('get access to admin panel as no user');
        $I->amOnRoute('admin.root');
        $I->seeResponseCodeIs(403);
    }
}
