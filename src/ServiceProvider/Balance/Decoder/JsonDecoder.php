<?php
namespace shamiln\monzo\ServiceProvider\Balance\Decoder;

use shamiln\monzo\Decoder\JsonDecoder as MonzoJsonDecoder;
use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Webmozart\Json\JsonDecoder as WebMozartJsonDecoder;

class JsonDecoder implements ServiceProviderInterface
{
    const PROVIDER_NAME_JSON_BALANCE_DECODER = 'decoder.json.balance';

    /**
     * {@inheritdoc}
     */
    public function register(Container $con)
    {
        $con[self::PROVIDER_NAME_JSON_BALANCE_DECODER] = function () use ($con) {
            return new MonzoJsonDecoder(
                new WebMozartJsonDecoder(),
                new \SplFileInfo(__DIR__ . '/../../../Resources/schema/Balance.json')
            );
        };
    }
}
