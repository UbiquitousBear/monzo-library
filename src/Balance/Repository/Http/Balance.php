<?php

namespace shamiln\monzo\Balance\Repository\Http;

use GuzzleHttp\Psr7\Request;
use shamiln\monzo\Account\Account;
use shamiln\monzo\HttpClient\HttpClientInterface;
use shamiln\monzo\Balance\Parser\BalanceResponse as BalanceResponseParser;
use shamiln\monzo\Repository\Exception\RepositoryError;
use shamiln\monzo\Balance\Balance as BalanceVO;
use shamiln\monzo\Balance\Repository\Balance as RepositoryInterface;

class Balance implements RepositoryInterface
{
    /**
     * @var HttpClientInterface
     */
    private $client;

    /**
     * @var BalanceResponseParser
     */
    private $parser;

    /**
     * Balance constructor.
     * @param HttpClientInterface $client
     * @param BalanceResponseParser $parser
     */
    public function __construct(HttpClientInterface $client, BalanceResponseParser $parser)
    {
        $this->client = $client;
        $this->parser = $parser;
    }

    /**
     * @param Account $account
     * @return BalanceVO
     */
    public function fetch(Account $account): BalanceVO
    {
        $response = $this->client->send(
            new Request(
                HttpClientInterface::METHOD_GET,
                sprintf(
                    '/balance?account_id=%s',
                    $account->id()
                )
            )
        );

        if ($response->getStatusCode() !== HttpClientInterface::STATUS_OK) {
            throw new RepositoryError();
        }

        return $this->parser->parse($response);
    }
}
