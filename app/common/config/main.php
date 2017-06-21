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
            'host' => 'http://mllphp.com/rpc.php'
        ],
    ],
];