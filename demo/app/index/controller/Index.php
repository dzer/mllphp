<?php

namespace app\index\controller;

use Mll\Controller\Controller;
use Mll\Mll;

class Index extends Controller
{
    public function index()
    {
        //$this->ww();
        //return 'sfdsf';
        var_dump(Mll::app()->request->param());
        var_dump($_REQUEST);
        //return $this->json(array('error' => 0, 'message' => '成功'));
    }
}