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
        $client = new \Yar_Client("http://mllphp.com/rpc.php");

        $result = $client->api('order/Index/index', array('手动阀是放大法'));
        var_dump($result);die;
        return $this->json(array('error' => 0, 'message' => '成功'));
    }
}