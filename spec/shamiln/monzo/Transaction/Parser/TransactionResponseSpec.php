<?php

namespace spec\shamiln\monzo\Transaction\Parser;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use shamiln\monzo\Decoder\JsonDecoder;
use shamiln\monzo\Transaction\Hydrator\TransactionHydrator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use shamiln\monzo\Transaction\Transaction;
use shamiln\monzo\Transaction\TransactionCollection;
use shamiln\monzo\Validator\SchemaValidatorInterface;

class TransactionResponseSpec extends ObjectBehavior
{
    private $payload = '{"transactions": []}';
    private $decodedPayload;

    function let(
        SchemaValidatorInterface $validator,
        JsonDecoder $decoder,
        TransactionHydrator $hydrator,
        ResponseInterface $response,
        StreamInterface $responseBody,
        \stdClass $payloadData
    )
    {

        $responseBody
            ->getContents()
            ->willReturn($this->payload);

        $response
            ->getBody()
            ->willReturn($responseBody);


        $payloadData->transactions = [];
        $this->decodedPayload = $payloadData;

        $this->beConstructedWith($validator, $decoder, $hydrator);
    }

    public function it_should_parse_a_response
    (
        $response,
        $hydrator,
        $validator,
        $decoder,
        Transaction $transaction
    )
    {
        $decoder->decode($this->payload)->willReturn($this->decodedPayload);

        $validator->isValid()->willReturn(true);
        $hydrator->hydrate('')->willReturn($transaction);

        $this->parse($response)->shouldReturnAnInstanceOf(TransactionCollection::class);
    }
}
