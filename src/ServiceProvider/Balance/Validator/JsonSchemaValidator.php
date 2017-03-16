<?php
namespace shamiln\monzo\ServiceProvider\Balance\Validator;

use shamiln\monzo\Validator\JsonSchemaValidator as SchemaValidator;
use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Webmozart\Json\JsonValidator;

class JsonSchemaValidator implements ServiceProviderInterface
{
    const VALIDATOR_JSON_BALANCE = 'validator.jsonschema.balance';

    /**
     * {@inheritdoc}
     */
    public function register(Container $con)
    {
        $con[self::VALIDATOR_JSON_BALANCE] = function () use ($con) {
            return new SchemaValidator(
                new \SplFileInfo(__DIR__ . '/../../../Resources/schema/Balance.json'),
                new JsonValidator()
            );
        };
    }
}
