<?php
namespace shamiln\monzo\ServiceProvider\Balance;

use shamiln\monzo\ServiceProvider\Balance\Decoder\JsonDecoder;
use shamiln\monzo\ServiceProvider\Balance\Repository\Http\BalanceRepository;
use shamiln\monzo\ServiceProvider\Balance\Validator\JsonSchemaValidator;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class BalanceBundle implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function register(Container $con)
    {
        $con
            ->register(new BalanceRepository())
            ->register(new JsonSchemaValidator())
            ->register(new JsonDecoder())
        ;
    }
}
