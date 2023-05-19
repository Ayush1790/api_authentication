<?php

declare(strict_types=1);

namespace Tests\Unit;

use MyApp\Controllers\IndexController;
use MyApp\Models\Users;

class IndexControllerTest extends AbstractUnitTest
//class UnitTest extends \PHPUnit\Framework\TestCase
{

    public function testController()
    {
        $new = new IndexController();
        $res = $new->addData("Ayush", 'ayush$gmail.com', 1234);
        $this->assertEquals($res, true, "pass");
        $this->assertFalse($new->addData("ayush", "", 1), "success");
        $res = $new->deleteData(9);
        $this->assertEquals($res, true, "pass");
    }
    public function testModel()
    {
        $user = new Users();
        $user->name = 'satyam';
        $user->email = 'satyam$gmail.com';
        $user->pswd = 123;
        $res = $user->save();
        $this->assertEquals($res, 1, "pass");
        $res = $user->delete(11);
        $this->assertEquals($res, 1, "pass");
    }

    public function testEmail()
    {
        $new = new IndexController();
        $this->assertTrue($new->emailValidator("aysuh@gmail.com"), "pass");
        $this->assertTrue($new->emailValidator("a@gmail.com"), "pass");
        $this->assertTrue($new->emailValidator("aysuh@redifmail.com"), "pass");
        $this->assertTrue($new->emailValidator("aysuh@gmail.in"), "pass");
        $this->assertFalse($new->emailValidator("aysuhgmail.in"), "pass");
        $this->assertFalse($new->emailValidator("aysuhgmail.in"), "pass");
        $this->assertFalse($new->emailValidator("aysuhgmailin"), "pass");
        $this->assertFalse($new->emailValidator("@gmail.in"), "pass");
        $this->assertFalse($new->emailValidator(""), "pass");
    }
}
