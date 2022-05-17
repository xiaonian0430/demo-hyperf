<?php
/**
 * user 服务
 */
namespace App\Service;
use Hyperf\Di\Annotation\Inject;
use Psr\EventDispatcher\EventDispatcherInterface;
use App\Event\UserRegistered;
use App\Model\User;

class UserService
{
    /**
     * @Inject 
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;
    
    public function register()
    {
        echo 'register ing'.PHP_EOL;
        // 我们假设存在 User 这个实体
        $user = new User();
        $user->name='测试';

        $result = $user->save();
        echo 'UserRegistered'.PHP_EOL;
        // 完成账号注册的逻辑
        // 这里 dispatch(object $event) 会逐个运行监听该事件的监听器
        $this->eventDispatcher->dispatch(new UserRegistered($user));
        return $result;
    }
}