<?php

namespace app\goods\controller;

use Mll\Controller\Controller;
use Mll\Core\Container;
use Mll\Mll;

class Index extends Controller
{
    public function index()
    {
        $rs = Mll::app()->rpc->get('order/Index/index', array(array('ss'=>'d')));
        $rs2 = Mll::app()->rpc->post('order/Index/index2', array('r' => array('aad'=>'d22')));

        $rs = json_decode($rs);
        $rs2 = json_decode($rs2);
        return $this->json(array('error' => 0, 'message' => '成功', 'rs' => $rs, 'rs2' => $rs2));
    }
}