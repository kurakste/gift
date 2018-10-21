<?php

namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;

class HomeCest
{
    public function checkOpen(FunctionalTester $I)
    {
        $I->amOnPage(['/']);
        $I->see('Hi!', 'h1');
 //       $I->seeInDatabase('posts', ['num_comments >=' => '0']);
        /* $I->amOnPage(\Yii::$app->homeUrl); */
        /* $I->see('My Application'); */
        /* $I->seeLink('About'); */
        /* $I->click('About'); */
        /* $I->see('This is the About page.'); */
    }

    public function checkNew(FunctionalTester $I)
    {
    
    }
}
