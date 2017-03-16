<?php
namespace shamiln\monzo\ServiceProvider\Transaction\Validator;

use Pimple\ServiceProviderInterface;
use shamiln\monzo\Validator\JsonSchemaValidator as SchemaValidator;
use Pimple\Container;
use Webmozart\Json\JsonValidator;

class JsonSchemaValidator implements ServiceProviderInterface
{

    const VALIDATOR_JSON_TRANSACTION_COLLECTION = 'validator.jsonschema.transaction_collection';
    const VALIDATOR_JSON_TRANSACTION = 'validator.jsonschema.trandaction';

    /**
     * {@inheritdoc}
     */
    public function register(Container $con)
    {
        $this->registerAccount($con);
        $this->registerAccountsCollection($con);
    }

    /**
     * @param Container $con
     */
    private function registerAccountsCollection(Container $con)
    {
        $con[self::VALIDATOR_JSON_TRANSACTION_COLLECTION] = function () use ($con) {
            return new SchemaValidator(
                new \SplFileInfo(__DIR__ . '/../../../Resources/schema/TransactionCollection.json'),
                new JsonValidator()
            );
        };
    }

    /**
     * @param Container $con
     */
    private function registerAccount(Container $con)
    {
        $con[self::VALIDATOR_JSON_TRANSACTION] = function () use ($con) {
            return new SchemaValidator(
                new \SplFileInfo(__DIR__ . '/../../../Resources/schema/Transaction.json'),
                new JsonValidator()
            );
        };
    }
}
