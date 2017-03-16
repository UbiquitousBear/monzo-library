<?php

namespace shamiln\monzo\Balance\Parser;

use shamiln\monzo\Balance\Balance;
use shamiln\monzo\Decoder\JsonDecoder as BalanceDecoder;
use shamiln\monzo\Balance\BalanceHydrator as BalanceHydrator;
use shamiln\monzo\Balance\Parser\Exception\ResponseParseException;
use shamiln\monzo\Validator\SchemaValidatorInterface;
use Psr\Http\Message\ResponseInterface;

class BalanceResponse
{
    /**
     * @var BalanceDecoder
     */
    private $decoder;

    /**
     * @var BalanceHydrator
     */
    private $hydrator;

    /**
     * @var SchemaValidatorInterface
     */
    private $validator;

    /**
     * BalanceResponse constructor.
     * @param BalanceDecoder $decoder
     * @param BalanceHydrator $hydrator
     * @param SchemaValidatorInterface $validator
     */
    public function __construct(
        BalanceDecoder $decoder,
        BalanceHydrator $hydrator,
        SchemaValidatorInterface $validator
    ) {
    
        $this->decoder   = $decoder;
        $this->hydrator  = $hydrator;
        $this->validator = $validator;
    }

    /**
     * @param ResponseInterface $response
     * @return Balance
     */
    public function parse(ResponseInterface $response): Balance
    {
        try {
            $balance = $this->decoder->decode($response->getBody()->getContents());
        } catch (\Exception $ex) {
            throw new ResponseParseException(
                sprintf(
                    'Failed to decode response: %s',
                    $ex->getMessage()
                )
            );
        }

        if (!$this->validator->isValid($balance)) {
            throw new ResponseParseException();
        }

        return $this->hydrator->hydrate($balance);
    }
}
