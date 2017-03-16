<?php
namespace shamiln\monzo\ServiceProvider\Transaction\Repository\Http;

use shamiln\monzo\ServiceProvider\HttpClient\HttpClient;
use shamiln\monzo\ServiceProvider\Transaction\Attachment\Hydrator\AttachmentHydrator;
use shamiln\monzo\ServiceProvider\Transaction\Counterparty\Hydrator\CounterpartyHydrator;
use shamiln\monzo\ServiceProvider\Transaction\Decoder\JsonDecoder;
use shamiln\monzo\ServiceProvider\Transaction\Merchant\Hydrator\MerchantHydrator;
use shamiln\monzo\ServiceProvider\Transaction\Metadata\Hydrator\MetadataHydrator;
use shamiln\monzo\ServiceProvider\Transaction\Validator\JsonSchemaValidator;
use shamiln\monzo\Transaction\Hydrator\TransactionHydrator;
use shamiln\monzo\Transaction\Parser\TransactionResponse;
use shamiln\monzo\Transaction\Repository\Http\Transactions as Repository;
use shamiln\monzo\ServiceProvider\Transaction\Repository\Repository as RepositoryInterface;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class TransactionRepository implements RepositoryInterface, ServiceProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function register(Container $con)
    {
        $con[self::PROVIDER_NAME_REPOSITORY_TRANSACTION] = function () use ($con) {
            return new Repository(
                $con[HttpClient::PROVIDER_NAME_HTTPCLIENT],
                new TransactionResponse(
                    $con[JsonSchemaValidator::VALIDATOR_JSON_TRANSACTION_COLLECTION],
                    $con[JsonDecoder::PROVIDER_NAME_JSON_TRANSACTION_COLLECTION_DECODER],
                    new TransactionHydrator(
                        $con[MetadataHydrator::PROVIDER_NAME_METADATA_HYDRATOR],
                        $con[AttachmentHydrator::PROVIDER_NAME_ATTACHMENT_HYDRATOR],
                        $con[CounterpartyHydrator::PROVIDER_NAME_COUNTERPARTY_HYDRATOR],
                        $con[MerchantHydrator::PROVIDER_NAME_MERCHANT_HYDRATOR]
                    )
                )
            );
        };
    }
}
