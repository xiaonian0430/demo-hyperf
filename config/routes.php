<?php

declare(strict_types=1);
/**
 * 路由配置
 */
use Hyperf\HttpServer\Router\Router;
Router::addGroup('/event/',function (){
    Router::get('index','App\Controller\EventController@index');
    Router::post('index','App\Controller\EventController@index');
});
Router::addGroup('/order/',function (){
    Router::get('index','App\Controller\OrderController@index');
    Router::post('index','App\Controller\OrderController@index');
});
Router::addGroup('/index/',function (){
    Router::get('index','App\Controller\IndexController@index');
    Router::post('index','App\Controller\IndexController@index');
});
Router::addGroup('/rpc/',function (){
    Router::get('index','App\Controller\RpcController@index');
    Router::post('index','App\Controller\RpcController@index');
});
Router::get('/', function(){
    return 'error';
});
Router::get('/favicon.ico', function () {
    return '';
});
