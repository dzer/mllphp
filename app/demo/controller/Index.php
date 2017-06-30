<?php

namespace app\demo\controller;

use Mll\Cache;
use Mll\Common\Rule;
use Mll\Controller;
use Mll\Mll;

class Index extends Controller
{
    public function index()
    {
        //1、常用组件调用rpc rule curl 缓存
        //2、请求自动缓存 SOURCE_CACHE_TIME
        //3、静态路由和动态路由
        //4、日志记录（系统错误，异常，人为日志记录）
        //5、DLog 错误 超时 调用链 请求参数 debug xhprof
        $addBuyInfo = Rule::callRule('JJG_HUV1_RuleActAddBuy', ['id' => '619']);

        $orderInfo = Mll::app()->rpc->get('order/BaseOrder/info', ['order_id' => '1980015']);

        $goodsInfo = Mll::app()->curl->get(
            'http://mllphp.com/goods/BaseGoods/info',
            ['goods_id' => '20001'],
            1
        );
        $goodsInfo = json_decode($goodsInfo, true);

        Cache::cut('code');
        Cache::set('order_info_1980015', $orderInfo, 30);
        $orderCache = Cache::get('order_info_1980015');

        return $this->json([
            'error' => 0,
            'msg' => '成功',
            'data' => [
                'addBuyInfo' => $addBuyInfo,
                'orderInfo' => $orderInfo,
                'goodsInfo' => $goodsInfo,
                'orderCache' => $orderCache,
            ]
        ]);
    }

}