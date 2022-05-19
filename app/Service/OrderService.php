<?php
/**
 * user 服务
 */
declare(strict_types=1);
namespace App\Service;
use Hyperf\Di\Annotation\Inject;
use Psr\EventDispatcher\EventDispatcherInterface;
use App\Event\OrderCreatedAfter;
use App\Event\OrderCreatedBefore;
use Hyperf\Utils\ApplicationContext;
class OrderService
{
    /**
     * @Inject 
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;
    
    public function create()
    {
        $this->eventDispatcher->dispatch(new OrderCreatedBefore(12));
        echo 'OrderCreating-----'.PHP_EOL;
        // 我们假设存在 User 这个实体
        $container = ApplicationContext::getContainer();
        $redis = $container->get(\Hyperf\Redis\Redis::class);
        $result = $redis->keys('*');
        echo 'OrderCreated-----'.PHP_EOL;
        $this->eventDispatcher->dispatch(new OrderCreatedAfter($result));
        return $result;
    }
}