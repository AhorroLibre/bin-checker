<?php
/**
 * Created by PhpStorm.
 * User: user1
 * Date: 5/9/17
 * Time: 9:45 AM
 */

namespace LuisDC\BinChecker\Exception;


class Unhandled extends \Exception
{
    public function __construct()
    {
        parent::__construct("The api produced and unhandled error");
    }
}