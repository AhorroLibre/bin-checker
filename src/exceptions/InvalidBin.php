<?php

/**
 * Created by PhpStorm.
 * User: user1
 * Date: 5/9/17
 * Time: 9:25 AM
 */

namespace LuisDC\BinChecker\Exception;

class InvalidBin extends \Exception
{
    public function __construct()
    {
        parent::__construct("Please make sure that you specify BIN in the correct format which is 6 digits long");
    }
}