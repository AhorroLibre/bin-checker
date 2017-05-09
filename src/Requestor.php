<?php
/**
 * Created by PhpStorm.
 * User: user1
 * Date: 5/9/17
 * Time: 9:18 AM
 */

namespace LuisDC\BinChecker;


use GuzzleHttp\Client;
use LuisDC\BinChecker\Exception\BinNotFound;
use LuisDC\BinChecker\Exception\InvalidApiKey;
use LuisDC\BinChecker\Exception\InvalidBin;
use LuisDC\BinChecker\Exception\LimitExceeded;
use LuisDC\BinChecker\Exception\Unhandled;

/**
 * Class Requestor
 * To use this class BE SURE TO DEFINE THE BIN_API_KEY ENVIRONMENT VARIABLE
 * @package LuisDC\BinChecker
 */
class Requestor
{
    /** @var string $apiKey */
    private $apiKey;

    /** @var Client $client */
    private $client;

    /**
     * Requestor constructor.
     */
    public function __construct()
    {
        $this->getApiKey();

        // Create a new guzzle client
        $this->client = new Client([
            'base_uri' => 'https://api.bincodes.com/bin/json/'. $this->apiKey . '/'
        ]);
    }

    /**
     * Requests a get to the bin checker api
     * @param int $bin
     * @return array
     * @throws \Exception
     */
    public function get(int $bin): array
    {
        $request = $this->client->get($bin . '');
        if ($request->getStatusCode() === 200) {
            $result = json_decode($request->getBody(), true);
            if (isset($result['error'])) {
                $this->throwApiException((int)$result['error']);
            } else {
                return $result;
            }
        } else {
            throw new \Exception("An error occurred trying to process your request");
        }
    }

    /**
     * Gets the api key from the environment variables
     * @throws \Exception
     */
    private function getApiKey()
    {
        $apiKey = getenv('BIN_API_KEY');
        if (!$apiKey) {
            throw new \Exception('Be sure to include the BIN_API_KEY on your environment variables');
        } else {
            $this->apiKey = $apiKey;
        }
    }

    /**
     * @param int $error
     * @throws BinNotFound
     * @throws InvalidApiKey
     * @throws InvalidBin
     * @throws LimitExceeded
     * @throws Unhandled
     */
    private function throwApiException(int $error)
    {
        if ($error === 1002) {
            throw new InvalidApiKey();
        }
        if ($error === 1004) {
            throw new LimitExceeded();
        }
        if ($error === 1011) {
            throw new InvalidBin();
        }
        if ($error === 1012) {
            throw new BinNotFound();
        }
        throw new Unhandled();
    }
}