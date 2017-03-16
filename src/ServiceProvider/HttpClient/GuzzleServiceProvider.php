<?php
namespace shamiln\monzo\ServiceProvider\HttpClient;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use GuzzleHttp\Client;
use \shamiln\monzo\HttpClient\Guzzle as GuzzleHttpClient;

class GuzzleServiceProvider implements HttpClient, ServiceProviderInterface
{
    const PROVIDER_NAME_GUZZLE = 'httpclient.guzzle.client';
    const API_ENDPOINT = 'https://api.monzo.com/';

    /**
     * @var string
     */
    private $apiEndpoint;

    /**
     * @var string
     */
    private $bearerToken;

    /**
     * @param string $bearerToken
     * @param string $endpoint
     */
    public function __construct(string $bearerToken, string $endpoint)
    {
        $this->bearerToken = $bearerToken;
        $this->apiEndpoint = $endpoint;
    }

    /**
     * @param string $bearerToken
     * @param string $endpoint
     * @return GuzzleServiceProvider
     */
    public static function fromConfig(string $bearerToken, string $endpoint = self::API_ENDPOINT)
    {
        return new self($bearerToken, $endpoint);
    }

    /**
     * {@inheritdoc}
     */
    public function register(Container $con)
    {
        $con[self::PROVIDER_NAME_HTTPCLIENT] = function () use ($con) {
            return new GuzzleHttpClient($con[self::PROVIDER_NAME_GUZZLE]);
        };

        $con[self::PROVIDER_NAME_GUZZLE] = function () use ($con) {
            return new Client(
                [
                    'base_uri' => $this->apiEndpoint,
                    'headers'  => [
                        'Authorization' => sprintf('Bearer %s', $this->bearerToken),
                    ],
                ]
            );
        };
    }
}
