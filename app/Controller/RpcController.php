<?php

declare(strict_types=1);
/**
 * json rpc
 */
namespace App\Controller;
use Hyperf\HttpServer\Contract\RequestInterface;
use App\JsonRpc\CalculatorServiceInterface;
use Hyperf\Utils\ApplicationContext;
class RpcController extends AbstractController
{
    public function index(RequestInterface $request)
    {
        $user = $request->input('user', 'Hyperf');
        $method = $request->getMethod();
        $client = ApplicationContext::getContainer()->get(CalculatorServiceInterface::class);
        $result = $client->add(12, 18);
        return [
            'method' => $method,
            'result' => $result,
            'message' => "Hello {$user}.",
        ];
    }
}
