<?php

/**
 * Created by PhpStorm.
 * User: user1
 * Date: 5/9/17
 * Time: 9:24 AM
 */

namespace LuisDC\BinChecker\Exception;

class BinNotFound extends \Exception
{
    public function __construct()
    {
        parent::__construct("The BIN that you submitted is not found in the database.");
    }
}