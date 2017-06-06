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
    /** @var Requestor $requestor */
    private $requestor;

    /** @var Checker|null */
    private static $instance;

    /**
     * Get a instance of this class
     * @return Checker
     */
    public static function getInstance(): Checker
    {
        if (self::$instance) {
            return self::$instance;
        } else {
            self::$instance = new Checker();
            return self::$instance;
        }
    }

    // make clone private
    private function __clone()
    {
    }

    // make wakeup private
    private function __wakeup()
    {
    }

    // make constructor private
    private function __construct()
    {
        $this->requestor = new Requestor();
    }

    /**
     * Gets info about the given bin
     * @param int $bin
     * @return Bin
     */
    public function getBinInfo(int $bin): Bin
    {
        $response = $this->requestor->get($bin);

        return $this->transformResponse($response);
    }

    /**
     * Transforms the response that the requestor obtained
     * @param array $response
     * @return Bin
     */
    private function transformResponse(array $response): Bin
    {
        $bin = (int) $response['bin'];
        if (empty($response['bank'])) {
            $bank = null;
        } else {
            $bank = $response['bank'];
        }

        if (empty($response['card'])) {
            $brand = null;
        } else {
            $brand = $response['card'];
        }

        if (empty($response['type'])) {
            $type = null;
        } else {
            $type = $response['type'];
        }

        if (empty($response['level'])) {
            $level = null;
        } else {
            $level = $response['level'];
        }

        if (empty($response['valid'])) {
            $valid = null;
        } else {
            $valid = $response['valid'];
        }

        return new Bin($bin, $bank, $brand, $type, $level, $valid);
    }
}