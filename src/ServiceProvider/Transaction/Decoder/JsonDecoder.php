<?php
namespace shamiln\monzo\ServiceProvider\Transaction\Decoder;

use shamiln\monzo\Decoder\JsonDecoder as MonzoJsonDecoder;
use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Webmozart\Json\JsonDecoder as WebMozartJsonDecoder;

class JsonDecoder implements ServiceProviderInterface
{
    const PROVIDER_NAME_JSON_TRANSACTION_COLLECTION_DECODER = 'decoder.json.transaction';

    /**
     * {@inheritdoc}
     */
    public function register(Container $con)
    {
        $con[self::PROVIDER_NAME_JSON_TRANSACTION_COLLECTION_DECODER] = function () use ($con) {
            return new MonzoJsonDecoder(
                new WebMozartJsonDecoder(),
                new \SplFileInfo(__DIR__ . '/../../../Resources/schema/TransactionCollection.json')
            );
        };
    }
}
