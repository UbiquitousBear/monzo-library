<?php

namespace shamiln\monzo\Account\Repository\Http;

use GuzzleHttp\Psr7\Request;
use shamiln\monzo\Account\AccountCollection;
use shamiln\monzo\HttpClient\HttpClientInterface;
use shamiln\monzo\Account\Parser\AccountsResponse as AccountCollectionParser;
use shamiln\monzo\Account\Repository\Accounts as AccountsInterface;
use shamiln\monzo\Repository\Exception\RepositoryError;
use GuzzleHttp\Exception\ClientException;

class Accounts implements AccountsInterface
{
    /**
     * @var HttpClientInterface
     */
    private $client;

    /**
     * @var AccountCollectionParser
     */
    private $parser;


    /**
     * Accounts constructor.
     * @param HttpClientInterface $client
     * @param AccountCollectionParser $parser
     */
    public function __construct(
        HttpClientInterface $client,
        AccountCollectionParser $parser
    ) {
    
        $this->client = $client;
        $this->parser = $parser;
    }

    /**
     * {@inheritdoc}
     */
    public function fetchAll(): AccountCollection
    {
        try {
            $response = $this->client->send(
                new Request(
                    HttpClientInterface::METHOD_GET,
                    '/accounts'
                )
            );
        } catch (ClientException $ex) {
            throw new RepositoryError();
        }

        if ($response->getStatusCode() !== HttpClientInterface::STATUS_OK) {
            throw new RepositoryError();
        }

        return $this->parser->parse($response);
    }
}
