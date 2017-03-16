<?php
namespace shamiln\monzo\HttpClient;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

interface HttpClientInterface
{
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';

    const STATUS_OK = 200;

    /**
     * @param RequestInterface $request
     * @return ResponseInterface
     */
    public function send(RequestInterface $request): ResponseInterface;
}
