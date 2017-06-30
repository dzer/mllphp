<?php

namespace app\goods\controller;

use Mll\Cache;
use Mll\Common\Rule;
use Mll\Controller;
use Mll\Curl\Curl;
use Mll\Mll;

class BaseGoods extends Controller
{
    public function info()
    {
        try {
            $goodsId = Mll::app()->request->param('goods_id', 0, 'intval');
            if ($goodsId <= 0) {
                throw new \Exception('商品id错误');
            }
            $goodsInfo = Rule::callRule('商品信息', ['商品id' => $goodsId]);
            return $this->json([
                    'error' => 0,
                    'message' => '成功',
                    'data' => [
                        'goodsInfo' => $goodsInfo
                    ]
                ]
            );
        } catch (\Exception $e) {
            return $this->json([
                    'error' => 1,
                    'message' => $e->getMessage(),
                ]
            );
        }
    }


    public function index()
    {
        //Mll::app()->log->error('ssssd');
        /*$rs = memcache_connect('192.168.2.214', 11211);
        var_dump($rs);die;*/

        $rs = Mll::app()->rpc->get('order/Index/index', array(array('ss' => 'd')));
        //$rs2 = Mll::app()->rpc->post('order/Index/index2', array('r' => array('aad'=>'d22')));

        $curl = new Curl();
        $rs = $curl->get('http://mllphp.com/order/Index/index', array('ss' => 'd'), 1);

        Mll::app()->log->debug('sssssss');
        Cache::cut('code');
        Cache::set('test_1111', 'feawfe', 30);
        $cache = Cache::get('test_1111');


        return $this->json(array('error' => 0, 'message' => '成功', 'rs' => 2, 'rs2' => 2, 'cache' => $cache));
    }

    public function index2()
    {
        return $this->json(array('error' => 0, 'message' => '成功'));
    }
}