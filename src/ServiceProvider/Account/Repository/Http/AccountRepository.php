<?php
namespace shamiln\monzo\ServiceProvider\Account\Repository\Http;

use shamiln\monzo\ServiceProvider\Account\Repository\Repository as RepositoryInterface;
use shamiln\monzo\Account\Parser\AccountsResponse;
use shamiln\monzo\ServiceProvider\Account\Decoder\JsonDecoder;
use shamiln\monzo\ServiceProvider\Account\Validator\JsonSchemaValidator;
use Pimple\Container;
use Pimple\ServiceProviderInterface;
use shamiln\monzo\ServiceProvider\HttpClient\HttpClient;
use shamiln\monzo\Account\Repository\Http\Accounts as Repository;
use shamiln\monzo\Account\Hydrator\AccountHydrator as AccountHydrator;

class AccountRepository implements RepositoryInterface, ServiceProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function register(Container $con)
    {
        $con[self::PROVIDER_NAME_REPOSITORY_ACCOUNTS] = function () use ($con) {
            return new Repository(
                $con[HttpClient::PROVIDER_NAME_HTTPCLIENT],
                new AccountsResponse(
                    $con[JsonDecoder::PROVIDER_NAME_JSON_ACCOUNTS_COLLECTION_DECODER],
                    new AccountHydrator(),
                    $con[JsonSchemaValidator::VALIDATOR_JSON_ACCOUNT]
                )
            );
        };
    }
}
