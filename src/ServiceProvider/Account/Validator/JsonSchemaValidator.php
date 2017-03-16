<?php
namespace shamiln\monzo\ServiceProvider\Account\Validator;

use Pimple\ServiceProviderInterface;
use shamiln\monzo\Validator\JsonSchemaValidator as SchemaValidator;
use Pimple\Container;
use Webmozart\Json\JsonValidator;

class JsonSchemaValidator implements ServiceProviderInterface
{

    const VALIDATOR_JSON_ACCOUNTS_COLLECTION = 'validator.jsonschema.accounts_collection';
    const VALIDATOR_JSON_ACCOUNT = 'validator.jsonschema.account';

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
        $con[self::VALIDATOR_JSON_ACCOUNTS_COLLECTION] = function () use ($con) {
            return new SchemaValidator(
                new \SplFileInfo(__DIR__ . '/../../../Resources/schema/AccountCollection.json'),
                new JsonValidator()
            );
        };
    }

    /**
     * @param Container $con
     */
    private function registerAccount(Container $con)
    {
        $con[self::VALIDATOR_JSON_ACCOUNT] = function () use ($con) {
            return new SchemaValidator(
                new \SplFileInfo(__DIR__ . '/../../../Resources/schema/Account.json'),
                new JsonValidator()
            );
        };
    }
}
