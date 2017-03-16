<?php
namespace shamiln\monzo\HttpClient;

use GuzzleHttp\Client;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class Guzzle implements HttpClientInterface
{
    /**
     * @var Client
     */
    private $client;

    /**
     * Guzzle constructor.
     * @param $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * (@inheritdoc
     */
    public function send(RequestInterface $request): ResponseInterface
    {
        return $this->client->send($request);
    }
}
