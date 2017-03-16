<?php

namespace shamiln\monzo\Account\Parser;

use shamiln\monzo\Account\AccountCollection;
use shamiln\monzo\Account\Hydrator\AccountHydrator as AccountHydrator;
use shamiln\monzo\Decoder\JsonDecoder as AccountCollectionDecoder;
use shamiln\monzo\Account\Parser\Exception\ResponseParseException;
use shamiln\monzo\Validator\SchemaValidatorInterface;
use Psr\Http\Message\ResponseInterface;

class AccountsResponse
{
    /**
     * @var AccountCollectionDecoder
     */
    private $decoder;

    /**
     * @var AccountHydrator
     */
    private $hydrator;

    /**
     * @var SchemaValidatorInterface
     */
    private $validator;

    public function __construct(
        AccountCollectionDecoder $decoder,
        AccountHydrator $hydrator,
        SchemaValidatorInterface $validator
    ) {
    
        $this->decoder   = $decoder;
        $this->hydrator  = $hydrator;
        $this->validator = $validator;
    }

    /**
     * @param ResponseInterface $response
     * @return AccountCollection
     */
    public function parse(ResponseInterface $response): AccountCollection
    {
        try {
            $collection = $this->decoder->decode($response->getBody()->getContents());
        } catch (\Exception $ex) {
            throw new ResponseParseException(
                'Failed to decode response: ' . $ex->getMessage()
            );
        }

        $accounts = [];

        foreach ($collection->accounts as $account) {
            if ($this->validator->isValid($account)) {
                $accounts[] = $this->hydrator->hydrate($account);
            }
        }

        return AccountCollection::fromArray($accounts);
    }
}
