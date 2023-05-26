<?php

namespace MyApp\Controllers;

use Phalcon\Mvc\Controller;
use MyApp\Models\Users;

class IndexController extends Controller
{
    public function indexAction()
    {
        $this->response->redirect('product');
    }
}
