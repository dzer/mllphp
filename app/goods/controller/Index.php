<?php

namespace app\goods\controller;

use Mll\Controller\Controller;
use Mll\Core\Container;
use Mll\Mll;

class Index extends Controller
{
    public function index()
    {
        //
        return $this->json(array('error' => 0, 'message' => '成功'));
    }
}