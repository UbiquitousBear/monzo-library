<?php

namespace shamiln\monzo\Transaction\Repository\Http;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Request;
use shamiln\monzo\Account\Account;
use shamiln\monzo\HttpClient\HttpClientInterface;
use shamiln\monzo\Repository\Exception\RepositoryError;
use shamiln\monzo\Transaction\Parser\TransactionResponse;
use \shamiln\monzo\Transaction\Repository\Transactions as RepositoryInterface;
use shamiln\monzo\Transaction\TransactionCollection;

class Transactions implements RepositoryInterface
{
    /**
     * @var HttpClientInterface
     */
    private $client;

    /**
     * @var TransactionResponse
     */
    private $parser;

    /**
     * Transactions constructor.
     * @param HttpClientInterface $client
     * @param TransactionResponse $parser
     */
    public function __construct(HttpClientInterface $client, TransactionResponse $parser)
    {
        $this->client = $client;
        $this->parser = $parser;
    }

    /**
     * {@inheritdoc}
     */
    public function fetchAll(Account $account): TransactionCollection
    {
        try {
            $response = $this->client->send(
                new Request(
                    HttpClientInterface::METHOD_GET,
                    sprintf(
                        '/transactions?account_id=%s&expand[]=merchant',
                        $account->id()
                    )
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
