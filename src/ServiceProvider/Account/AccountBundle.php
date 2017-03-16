<?php
namespace shamiln\monzo\ServiceProvider\Account;

use shamiln\monzo\ServiceProvider\Account\Decoder\JsonDecoder;
use shamiln\monzo\ServiceProvider\Account\Repository\Http\AccountRepository;
use shamiln\monzo\ServiceProvider\Account\Validator\JsonSchemaValidator;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class AccountBundle implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function register(Container $con)
    {
        $con
            ->register(new AccountRepository())
            ->register(new JsonSchemaValidator())
            ->register(new JsonDecoder())
            ;
    }
}
