<?php

namespace spec\shamiln\monzo\Account\Parser;

use shamiln\monzo\Account\Account;
use shamiln\monzo\Account\AccountCollection;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use shamiln\monzo\Account\Hydrator\AccountHydrator as AccountHydrator;
use shamiln\monzo\Decoder\JsonDecoder as AccountCollectionDecoder;
use shamiln\monzo\Validator\SchemaValidatorInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

class AccountsResponseSpec extends ObjectBehavior
{
    private $responsePayload = '{"accounts": []}';
    private $account;
    private $dto;


    function let(
        AccountCollectionDecoder $decoder,
        AccountHydrator $hydrator,
        SchemaValidatorInterface $validator,
        ResponseInterface $response,
        StreamInterface $responseBody
    )
    {

        $responseBody
            ->getContents()
            ->willReturn($this->responsePayload);

        $response
            ->getBody()
            ->willReturn($responseBody);

        $this->account = new Account(
            'acc_00009237aqC8c5umZmrRdh',
            'Peter Pan\'s Account',
            '2015-11-13T12:17:42Z'
        );

        $dto = new \stdClass();
        $dto->accounts = [];
        $this->dto = $dto;


        $this->beConstructedWith($decoder, $hydrator, $validator);
    }

    public function it_can_parse_a_response(
        $response,
        $decoder,
        $validator,
        $hydrator
    )
    {
        $decoder->decode($this->responsePayload)->willReturn($this->dto);
        $validator->isValid($this->dto)->willReturn(true);
        $hydrator->hydrate($this->dto)->willReturn($this->account);


        $this->parse($response)->shouldBeAnInstanceOf(AccountCollection::class);
    }
}
