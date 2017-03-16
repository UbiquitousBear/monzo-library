<?php

namespace spec\shamiln\monzo\Balance\Repository\Http;

use shamiln\monzo\Account\Account;
use shamiln\monzo\Balance\Parser\BalanceResponse;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use shamiln\monzo\HttpClient\HttpClientInterface;
use shamiln\monzo\Balance\Balance as BalanceVO;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

class BalanceSpec extends ObjectBehavior
{
    function let(
        HttpClientInterface $httpClient,
        BalanceResponse $parser,
        ResponseInterface $response,
        StreamInterface $stream
    )
    {
        $this->beConstructedWith($httpClient, $parser);

        $response->getBody()->willReturn($stream);
        $httpClient->send(Argument::type(RequestInterface::class))->willReturn($response);
        $response->getStatusCode()->willReturn(200);
    }

    public function it_can_fetch_accounts(
        Account $account,
        BalanceVO $balance,
        $parser,
        $response
    )
    {
        $account->id()->willReturn('103q');


        $parser->parse($response)->willReturn($balance);

        $this->fetch($account)->shouldReturnAnInstanceOf(BalanceVO::class);
    }
}
