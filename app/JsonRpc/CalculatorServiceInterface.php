<?php
declare(strict_types=1);

namespace App\JsonRpc;

interface CalculatorServiceInterface
{
    /**
     * 两个数相加
     */
    public function add(int $a, int $b): int;
}