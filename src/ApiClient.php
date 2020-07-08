<?php

namespace Balt;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Psr\Log\LoggerInterface;

class ApiClient
{
    const METHOD_GET = 'GET';
    const METHOD_PUT = 'PUT';
    const METHOD_POST = 'POST';
    const METHOD_DELETE = 'DELETE';
    const METHOD_PATCH = 'PATCH';

    /**
     * @var Client
     */
    private $client;

    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger) {
        $this->logger = $logger;
    }

    /**
     * @param string $url
     * @param array $data
     * @param array $options
     * @return ApiResponse
     */
    public function create(string $url, array $data, array $options = []): ApiResponse
    {
        return $this->request(self::METHOD_POST, $url, $data);
    }

    /**
     * @param string $url
     * @param array $parameter
     * @param array $options
     * @return ApiResponse
     */
    public function get(string $url, array $parameter = [], array $options = []): ApiResponse
    {

        return $this->request(self::METHOD_GET, $url, [], $options);
    }


    /**
     * @param string $method
     * @param string $url
     * @param array $data
     * @param array $options
     * @return ApiResponse
     */
    protected function request(string $method, string $url, array $data = [], array $options = []): ApiResponse
    {
        try {
            $response = $this->client->request($method, $url);

            return new ApiResponse($response);

        } catch (ClientException $exception) {

            return new ApiResponse($exception->getResponse());
        }
    }
}