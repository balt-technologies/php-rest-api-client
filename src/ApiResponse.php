<?php

namespace Balt;

use Psr\Http\Message\ResponseInterface;

class ApiResponse
{

    /**
     * @var ResponseInterface
     */
    private $response;

    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }

}