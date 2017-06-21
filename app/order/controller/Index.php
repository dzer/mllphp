<?php

namespace app\order\controller;

use Mll\Controller\Controller;
use Mll\Core\Container;
use Mll\Mll;

class Index extends Controller
{
    public function index()
    {
        return $this->json(array('get' => $_GET));
    }

    public function index2()
    {
        return $this->json(array('post' => $_POST['r']));
    }
}