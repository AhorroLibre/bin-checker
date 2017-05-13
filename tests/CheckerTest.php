<?php

/**
 * Created by PhpStorm.
 * User: user1
 * Date: 5/9/17
 * Time: 8:47 AM
 */

namespace LuisDC\Tests;

use LuisDC\BinChecker\Bin;
use LuisDC\BinChecker\Checker;
use PHPUnit\Framework\TestCase;

class CheckerTest extends TestCase
{
    /**
     * @covers Checker::getBinInfo
     * @test
     */
    public function it_gets_bin()
    {
        $binNumber = 412309;
        $checker = Checker::getInstance();
        $bin = $checker->getBinInfo($binNumber);

        $this->assertInstanceOf(Bin::class, $bin);
        $this->assertEquals($binNumber, $bin->getBin());
    }
}