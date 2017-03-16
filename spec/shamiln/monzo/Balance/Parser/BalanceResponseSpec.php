<?php

namespace spec\shamiln\monzo\Balance\Parser;

use shamiln\monzo\Decoder\JsonDecoder as BalanceDecoder;
use shamiln\monzo\Balance\BalanceHydrator as BalanceHydrator;
use shamiln\monzo\Validator\SchemaValidatorInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use shamiln\monzo\Balance\Balance;

class BalanceResponseSpec extends ObjectBehavior
{
    private $responsePayload = '{}';
    private $balance;
    private $dto;

    function let(
        BalanceDecoder $decoder,
        BalanceHydrator $hydrator,
        SchemaValidatorInterface $validator,
        ResponseInterface $response,
        StreamInterface $responseBody
    )
    {
        $this->beConstructedWith($decoder, $hydrator, $validator);

        $this->balance = new Balance(
            100,
            'GBP',
            0
        );

        $responseBody
            ->getContents()
            ->willReturn($this->responsePayload);

        $response
            ->getBody()
            ->willReturn($responseBody);

        $dto = new \stdClass();
        $this->dto = $dto;
    }

    public function it_can_parse_a_response(
        ResponseInterface $response,
        $decoder,
        $validator,
        $hydrator
    )
    {
        $decoder->decode($this->responsePayload)->willReturn($this->dto);
        $validator->isValid($this->dto)->willReturn(true);
        $hydrator->hydrate($this->dto)->willReturn($this->balance);


        $this->parse($response)->shouldBeAnInstanceOf(Balance::class);
    }
}
