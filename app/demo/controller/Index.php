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
        phpinfo();die;
        //echo 'ss';
        return $this->render('index', [
            'src' => 'http://images.meilele.com/images/201603/1459279762297239549.jpg'
        ]);
    }

    public function index2()
    {
        $routingkey = 'key';
//设置你的连接
        $conn_args = array('host' => '192.168.0.104', 'port' => '5672', 'login' => 'admin', 'password' => '123456');
        $conn = new \AMQPConnection($conn_args);
        if ($conn->connect()) {
            echo "Established a connection to the broker \n";
        } else {
            echo "Cannot connect to the broker \n ";
        }
//你的消息
        $message = json_encode(array('Hello World3!', 'php3', 'c++3:', time()));
//创建channel
        $channel = new \AMQPChannel($conn);
//创建exchange
        $ex = new \AMQPExchange($channel);
        $ex->setName('exchange');//创建名字
        $ex->setType(AMQP_EX_TYPE_DIRECT);
        $ex->setFlags(AMQP_DURABLE);
        $ex->declareExchange();

        $q = new \AMQPQueue($channel);
        $q->setName('queue2');
        $q->setFlags(AMQP_DURABLE);
        echo "queue status: " . $q->declareQueue();
        echo "\n";
        echo 'queue bind: ' . $q->bind('exchange', $routingkey);

        echo "\n";
        for ($i = 0; $i < 10; $i++) {
            $ex->publish('hello-' . $i, $routingkey);
        }
        /*
        $ex->publish($message,$routingkey);
        创建队列
        $q = new AMQPQueue($channel);
        设置队列名字 如果不存在则添加
        $q->setName('queue');
        $q->setFlags(AMQP_DURABLE | AMQP_AUTODELETE);
        echo "queue status: ".$q->declare();
        echo "\n";
        echo 'queue bind: '.$q->bind('exchange','route.key');
        将你的队列绑定到routingKey
        echo "\n";

        $channel->startTransaction();
        echo "send: ".$ex->publish($message, 'route.key'); //将你的消息通过制定routingKey发送
        $channel->commitTransaction();
        $conn->disconnect();
        */
    }

    public function demo()
    {
        Mll::app()->config->get('app_debug');
        Mll::app()->config->get('request.driver');
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

        Mll::app()->log->debug('这是debug信息');
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