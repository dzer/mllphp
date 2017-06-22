<?php
/**
 * 项目配置
 */
return [
    //是否开启调试模式
    'app_debug' => true,
    //时区
    'time_zone' => 'Asia/Shanghai',
    'view_mode' => 'php',

    'request' => [
        'driver' => 'http',
        'http' => [
            // 默认模块名
            'default_module' => 'goods',
            // 禁止访问模块
            'deny_module_list' => ['common'],
            // 默认控制器名
            'default_controller' => 'Index',
            // 默认操作名
            'default_action' => 'index',
            //兼容pathInfo
            'path_info_var' => 'r',
            // 表单请求类型伪装变量
            'var_method'             => '_method',
        ],
    ],

    'exception' => [
        'template' => null,//错误提示模板
        'exception_handle' => '\Mll\Exception\Handle',//错误处理
        'show_error_msg' => true, //是否只显示错误信息
        'error_message' => '系统繁忙,请稍后再试', //错误提示
    ],
    'log' => [
        'driver' => 'file',
        'file' => [
            'time_format' => 'c', //ISO 8601 格式的日期
            'file_size' => 2097152, //文件大小
            'path' => '/runtime/log', //报错日志路径
            'level' => 'all', //默认所有，或者逗号隔开warning,error
            'separator' => ' | ', //分隔符
            'suffix' => '.log', //日志文件后缀
        ],
    ],
    'rpc' => [
        'driver' => 'yar',
        'yar' => [
            'host' => 'http://mllphp.com/rpc.php',
            'connect_timeout' => 2,    //连接超时
            'timeout' => 10,    //响应超时
        ],
    ],

    'cache' => [
        'default' =>[
            'driver' => 'memcache',
            'default' => [
                'host' => 'memcache.meilele.com ',
                'port' => 11211,
                'prefix' => '',
                'persistent' => true,
                'expire'     => 0,
                'timeout'    => 0, // 超时时间（单位：毫秒）
            ]
        ],
        'memcache' => [
            'driver' => 'memcache',
            'code' => [
                'host' => 'codememc.meilele.com',
                'port' => 11210
            ],
            'zx' => [
                'host' => 'zxmemcache.meilele.com',
                'port' => 11213
            ],
        ],
        'file' => [
            'driver' => 'file',
            'file' => [
                'expire'        => 0,
                'cache_subdir'  => true,
                'prefix'        => '',
                'path'          => '/runtime/temp/cache',
                'data_compress' => false,
            ]
        ],
    ],
    'session' => [
        'driver' => 'memcache',
        'auto_start' => 1,
        'prefix' => '',
        'var_session_id' => '',
        //'name' => '',
        'path' => '',
        'domain' => '',
        'expire' => '',
        'use_cookies' => '',
        'cache_limiter' => '',
        'cache_expire' => '',
        'driver_config' => [
            'host'         => 'memcache.meilele.com', // memcache主机
            'port'         => 11211, // memcache端口
            'expire'       => 3600, // session有效期
            'timeout'      => 0, // 连接超时时间（单位：毫秒）
            'persistent'   => true, // 长连接
            'session_name' => '', // memcache key前缀
        ]
    ]

];