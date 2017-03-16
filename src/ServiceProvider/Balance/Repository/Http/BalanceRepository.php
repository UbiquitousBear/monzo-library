<?php

namespace shamiln\monzo\ServiceProvider\Balance\Repository\Http;

use shamiln\monzo\Balance\Parser\BalanceResponse;
use shamiln\monzo\ServiceProvider\Balance\Decoder\JsonDecoder;
use shamiln\monzo\ServiceProvider\HttpClient\HttpClient;
use shamiln\monzo\ServiceProvider\Balance\Repository\Balance;
use shamiln\monzo\ServiceProvider\Balance\Validator\JsonSchemaValidator;
use Pimple\Container;
use Pimple\ServiceProviderInterface;
use shamiln\monzo\Balance\Repository\Http\Balance as Repository;
use shamiln\monzo\Balance\BalanceHydrator as BalanceHydrator;

class BalanceRepository implements Balance, ServiceProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function register(Container $con)
    {
        $con[self::PROVIDER_NAME_REPOSITORY_BALANCE] = function () use ($con) {
            return new Repository(
                $con[HttpClient::PROVIDER_NAME_HTTPCLIENT],
                new BalanceResponse(
                    $con[JsonDecoder::PROVIDER_NAME_JSON_BALANCE_DECODER],
                    new BalanceHydrator(),
                    $con[JsonSchemaValidator::VALIDATOR_JSON_BALANCE]
                )
            );
        };
    }
}
