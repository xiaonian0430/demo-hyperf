<?php
/**
 * user 服务
 */
namespace App\Service;
use Hyperf\Di\Annotation\Inject;
use Psr\EventDispatcher\EventDispatcherInterface;
use App\Event\UserRegistered;
use App\Model\User;
use Hyperf\Utils\ApplicationContext;
class UserService
{
    /**
     * @Inject 
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;
    
    public function register()
    {
        echo 'UserRegistering-----'.PHP_EOL;
        // 我们假设存在 User 这个实体
        $container = ApplicationContext::getContainer();
        $redis = $container->get(\Hyperf\Redis\Redis::class);
        $result = $redis->keys('*');
        /*
        $user = new User();
        $user->name='测试';
        $user->gender=1;
        $user->created_timestamp=time();
        $user->updated_timestamp=time();
        $result = $user->save();
        */
        echo 'UserRegistered-----'.PHP_EOL;
        // 完成账号注册的逻辑
        // 这里 dispatch(object $event) 会逐个运行监听该事件的监听器
        $this->eventDispatcher->dispatch(new UserRegistered($result));
        return $result;
    }
}