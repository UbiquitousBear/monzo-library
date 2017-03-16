<?php

namespace shamiln\monzo\ServiceProvider\Transaction;

use shamiln\monzo\ServiceProvider\Transaction\Attachment\Hydrator\AttachmentHydrator;
use shamiln\monzo\ServiceProvider\Transaction\Counterparty\Hydrator\CounterpartyHydrator;
use shamiln\monzo\ServiceProvider\Transaction\Decoder\JsonDecoder;
use shamiln\monzo\ServiceProvider\Transaction\Merchant\Hydrator\MerchantHydrator;
use shamiln\monzo\ServiceProvider\Transaction\Metadata\Hydrator\MetadataHydrator;
use shamiln\monzo\ServiceProvider\Transaction\Repository\Http\TransactionRepository;
use shamiln\monzo\ServiceProvider\Transaction\Validator\JsonSchemaValidator;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class TransactionBundle implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function register(Container $con)
    {
        $con
            ->register(new TransactionRepository())
            ->register(new JsonSchemaValidator())
            ->register(new JsonDecoder())
            ->register(new MetadataHydrator())
            ->register(new AttachmentHydrator())
            ->register(new CounterpartyHydrator())
            ->register(new MerchantHydrator())
        ;
    }
}
