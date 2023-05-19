<?php

namespace MyApp\Controllers;

use Phalcon\Mvc\Controller;
use MyApp\Models\Users;

class IndexController extends Controller
{
    public function addData($name, $email, $pswd)
    {
        $user = new Users();
        $user->assign([
            'name' => $name,
            'email' => $email,
            'pswd' => $pswd
        ]);
        $result = $user->save();
        if ($result == 1) {
            return true;
        }
        return false;
    }
    public function deleteData($id)
    {
        $user = Users::findFirst($id);
        $result = $user->delete();
        if ($result == 1) {
            return true;
        }
        return false;
    }

    public function emailValidator($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          return false;
        }
        return true;
    }
}
