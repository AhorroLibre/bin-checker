<?php

/**
 * Created by PhpStorm.
 * User: user1
 * Date: 5/9/17
 * Time: 8:40 AM
 */

namespace LuisDC\BinChecker;

class Checker
{
    private $requestor;

    function __construct()
    {
        $this->requestor = new Requestor("");
    }

    public function getBinInfo(int $bin): Bin
    {
        $response = $this->requestor->get($bin);

        return $this->transformResponse($response);
    }

    private function transformResponse(array $response)
    {
        $bin = (int) $response['bin'];
        $bank = $response['bank'];
        $brand = $response['card'];
        $type = $response['type'];
        return new Bin($bin, $bank, $brand, $type);
    }
}