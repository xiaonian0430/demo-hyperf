<?php

declare(strict_types=1);
/**
 * 事件
 */
namespace App\Controller;
use App\Service\OrderService;
use Hyperf\HttpServer\Contract\RequestInterface;
class OrderController extends AbstractController
{
    public function index(RequestInterface $request)
    {
        $user = $request->input('user', 'Hyperf');
        $method = $request->getMethod();
        $userService=new OrderService();
        $result=$userService->create();
        return [
            'method' => $method,
            'result' => $result,
            'message' => "Hello {$user}.",
        ];
    }
}
