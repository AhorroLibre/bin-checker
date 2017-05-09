<?php
/**
 * Created by PhpStorm.
 * User: user1
 * Date: 5/9/17
 * Time: 9:18 AM
 */

namespace LuisDC\BinChecker;


use GuzzleHttp\Client;
use LuisDC\BinChecker\Exception\Unhandled;
use Psr\Http\Message\ResponseInterface;

class Requestor
{
    /** @var string $apiKey */
    public $apiKey;

    /** @var Client $client */
    private $client;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
        $this->client = new Client([
            'base_uri' => 'https://api.bincodes.com/bin/json/'. $this->apiKey . '/'
        ]);
    }

    public function get(int $bin): array
    {
        $request = $this->client->get($bin);
        if ($request->getStatusCode() === 200) {
            return json_decode($request->getBody(), true);
        } else {
            // TODO: throw exception
            throw new Unhandled();
        }
    }
}