<?php

namespace spec\shamiln\monzo\HttpClient;

use GuzzleHttp\Client;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use shamiln\monzo\HttpClient\Guzzle;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GuzzleSpec extends ObjectBehavior
{
    public function let(
        Client $guzzleClient,
        ResponseInterface $response,
        RequestInterface $request
    )
    {
        $guzzleClient->send($request)->willReturn($response);
        $this->beConstructedWith($guzzleClient);
    }

    public function it_can_receive_a_response(
         $response,
         $request
    )
    {
        $this->send($request)->shouldReturn($response);
    }
}
