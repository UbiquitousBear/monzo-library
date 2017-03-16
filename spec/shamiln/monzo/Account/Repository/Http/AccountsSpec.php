<?php

namespace spec\shamiln\monzo\Repository\Http;

use shamiln\monzo\Account\AccountCollection;
use shamiln\monzo\HttpClient\HttpClientInterface;
use shamiln\monzo\Account\Parser\AccountsResponse as AccountsResponseParser;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class AccountsSpec extends ObjectBehavior
{
    public function let(
        HttpClientInterface $httpClient,
        AccountsResponseParser $parser,
        ResponseInterface $response,
        AccountCollection $collection
    )
    {

        $httpClient->send(Argument::type(RequestInterface::class))->willReturn($response);
        $response->getStatusCode()->willReturn(HttpClientInterface::STATUS_OK);
        $parser->parse($response)->willReturn($collection);

        $this->beConstructedWith($httpClient, $parser);
    }

    public function it_can_fetch_accounts()
    {
        $this->fetchAll()->shouldReturnAnInstanceOf(AccountCollection::class);
    }
}
