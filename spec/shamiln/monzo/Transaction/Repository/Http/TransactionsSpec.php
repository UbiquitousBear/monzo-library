<?php

namespace spec\shamiln\monzo\Transaction\Repository\Http;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use shamiln\monzo\Account\Account;
use shamiln\monzo\HttpClient\HttpClientInterface;
use shamiln\monzo\Transaction\Parser\TransactionResponse as TransactionResponseParser;
use shamiln\monzo\Transaction\Repository\Http\Transactions;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use shamiln\monzo\Transaction\TransactionCollection;

class TransactionsSpec extends ObjectBehavior
{
    public function let(
        HttpClientInterface $httpClient,
        TransactionResponseParser $parser,
        ResponseInterface $response,
        TransactionCollection $collection
    )
    {

        $httpClient->send(Argument::type(RequestInterface::class))->willReturn($response);
        $response->getStatusCode()->willReturn(HttpClientInterface::STATUS_OK);
        $parser->parse($response)->willReturn($collection);

        $this->beConstructedWith($httpClient, $parser);
    }

    public function it_can_fetch_accounts(
        Account $account
    )
    {
        $account->id()->willReturn('43432');

        $this->fetchAll($account)->shouldReturnAnInstanceOf(TransactionCollection::class);
    }
}
