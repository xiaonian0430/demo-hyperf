<?php

declare(strict_types=1);
/**
 * 事件
 */
namespace App\Controller;
use App\Service\UserService;
use Hyperf\HttpServer\Contract\RequestInterface;
class EventController extends AbstractController
{
    public function index(RequestInterface $request)
    {
        $user = $request->input('user', 'Hyperf');
        $method = $request->getMethod();
        $userService=new UserService(0);
        $result=$userService->register();
        return [
            'method' => $method,
            'result' => $result,
            'message' => "Hello {$user}.",
        ];
    }
}
