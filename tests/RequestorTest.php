<?php
/**
 * Created by PhpStorm.
 * User: user1
 * Date: 5/9/17
 * Time: 10:42 AM
 */

namespace LuisDC\Tests;


use LuisDC\BinChecker\Requestor;
use PHPUnit\Framework\TestCase;

class RequestorTest extends TestCase
{

    protected function setUp()
    {
        parent::setUp();
        // Back up the original value of the key
        $backup = getenv('BIN_KEY_API');
        putenv('BACKUP_BIN_API_KEY=$backup');
    }

    /**
     * @test
     * @covers Requestor::get
     */
    public function it_gets_response_from_api()
    {
        $bin = 416909;
        $requestor = new Requestor();
        $response = $requestor->get($bin);
        $this->assertTrue(is_array($response));
    }

    /**
     * @test
     * @covers Requestor::get
     * @expectedException \Exception
     */
    public function it_throws_exception_with_no_api_key()
    {
        putenv('BIN_API_KEY');

        $bin = 416909;
        $requestor = new Requestor();
        $requestor->get($bin);
    }

    protected function tearDown()
    {
        // Return the api key to its default value
        $backup = getenv('BACKUP_BIN_API_KEY');
        putenv('BIN_API_KEY=$backup');

        parent::tearDown();
    }

}