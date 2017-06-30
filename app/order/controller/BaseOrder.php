<?php

namespace app\order\controller;

use Mll\Common\Rule;
use Mll\Controller;
use Mll\Mll;

class BaseOrder extends Controller
{
    public function info()
    {
        try {
            $orderId = Mll::app()->request->param('order_id', 0, 'intval');
            if ($orderId <= 0) {
                throw new \Exception('订单id错误');
            }
            $orderInfo = Rule::callRule('订单表', ['订单ID' => '1980015']);
            return $this->json([
                    'error' => 0,
                    'message' => '成功',
                    'data' => [
                        'orderInfo' => $orderInfo
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

    public function index2()
    {
        return $this->json([
                'error' => 0,
                'message' => '成功',
                'data' => [
                    'id' => Mll::app()->request->param('id')
                ]
            ]
        );
    }
}