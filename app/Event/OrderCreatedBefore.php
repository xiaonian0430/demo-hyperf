<?php
/**
 * 定义一个事件
 */
namespace App\Event;

class OrderCreatedBefore
{
    // 建议这里定义成 public 属性，以便监听器对该属性的直接使用，或者你提供该属性的 Getter
    public $order;
    
    public function __construct($order)
    {
        $this->order = $order;    
    }
}