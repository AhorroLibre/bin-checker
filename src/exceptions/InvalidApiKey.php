<?php
/**
 * Created by PhpStorm.
 * User: user1
 * Date: 5/9/17
 * Time: 11:13 AM
 */

namespace LuisDC\BinChecker\Exception;


class InvalidApiKey extends \Exception
{
    public function __construct()
    {
        parent::__construct("Invalid API Key");
    }
}