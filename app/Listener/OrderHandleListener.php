<?php

namespace App\Listener;
use App\Event\OrderCreatedBefore;
use App\Event\OrderCreatedAfter;
use Hyperf\Event\Contract\ListenerInterface;
use Swoole\Coroutine\System;
class OrderHandleListener implements ListenerInterface
{
    public function listen(): array
    {
        // 返回一个该监听器要监听的事件数组，可以同时监听多个事件
        return [
            OrderCreatedBefore::class,
            OrderCreatedAfter::class
        ];
    }

    public function process(object $event)
    {
        switch (true) {
            case $event instanceof OrderCreatedBefore:
                echo 'OrderCreatedBefore Event processe start....'.PHP_EOL;
                System::sleep(2);
                echo 'OrderCreatedBefore Event processed end....'.PHP_EOL;
                break;
            case $event instanceof OrderCreatedAfter:
                echo 'OrderCreatedAfter Event processe start....'.PHP_EOL;
                System::sleep(3);
                echo 'OrderCreatedAfter Event processed end....'.PHP_EOL;
                break;
        }
    }
}
