<?php
return array(
    'route' => array(
        'static' => array(
            'order' => array(
                'order\\BaseOrder\\info',
                array(),    //默认参数，可选项
            ),
        ),
        'dynamic' => array(
            '/^goods\/(\d+)$/iU' => array(                                  //匹配 /product/123 将被匹配
                'goods\\BaseGoods\\info',           //ctrl class
                array('goods_id'),                //匹配参数                          //名为id的参数将被赋值 123
                'goods/{goods_id}'             //格式化
            ),
        )
    )
);
