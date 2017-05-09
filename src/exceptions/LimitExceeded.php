<?php
/**
 * Created by PhpStorm.
 * User: user1
 * Date: 5/9/17
 * Time: 10:45 AM
 */

namespace LuisDC\BinChecker\Exception;


class LimitExceeded extends \Exception
{
    public function __construct()
    {
        parent::__construct("You have exceeded the daily limit allocated to your account");
    }
}