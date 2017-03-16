<?php

namespace shamiln\monzo\Transaction\Parser;

use shamiln\monzo\Decoder\JsonDecoder;
use shamiln\monzo\Transaction\Hydrator\TransactionHydrator;
use shamiln\monzo\Transaction\Parser\Exception\ResponseParseException;
use shamiln\monzo\Transaction\TransactionCollection;
use shamiln\monzo\Validator\SchemaValidatorInterface;
use Psr\Http\Message\ResponseInterface;

class TransactionResponse
{
    /**
     * @var SchemaValidatorInterface
     */
    private $validator;

    /**
     * @var JsonDecoder
     */
    private $decoder;

    /**
     * @var TransactionHydrator
     */
    private $hydrator;

    /**
     * TransactionResponse constructor.
     * @param SchemaValidatorInterface $validator
     * @param JsonDecoder $decoder
     * @param TransactionHydrator $hydrator
     */
    public function __construct(
        SchemaValidatorInterface $validator,
        JsonDecoder $decoder,
        TransactionHydrator $hydrator
    ) {
    
        $this->validator = $validator;
        $this->decoder = $decoder;
        $this->hydrator = $hydrator;
    }

    /**
     * @param ResponseInterface $response
     * @return TransactionCollection
     */
    public function parse(ResponseInterface $response): TransactionCollection
    {

        try {
            $collection = $this->decoder->decode($response->getBody()->getContents());
        } catch (\Exception $ex) {
            throw new ResponseParseException(
                'Failed to decode response: ' . $ex->getMessage()
            );
        }

        $transactions = [];

        foreach ($collection->transactions as $trans) {
            if ($this->validator->isValid($trans)) {
                $transactions[] = $this->hydrator->hydrate($trans);
            }
        }

        return TransactionCollection::fromArray($transactions);
    }
}
