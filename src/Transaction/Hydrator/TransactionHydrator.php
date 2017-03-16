<?php

namespace shamiln\monzo\Transaction\Hydrator;

use DateTimeImmutable;
use DateTime;
use shamiln\monzo\Transaction\Attachment\Hydrator\AttachmentHydrator;
use shamiln\monzo\Transaction\Counterparty\Hydrator\CounterpartyHydrator;
use shamiln\monzo\Transaction\Merchant\Hydrator\MerchantHydrator;
use shamiln\monzo\Transaction\Metadata\Hydrator\MetadataHydrator;
use shamiln\monzo\Transaction\Transaction as TransactionVO;

class TransactionHydrator
{
    const DATE_FORMAT = 'Y-m-d\TH:i:s.uO';


    /**
     * @var MetadataHydrator
     */
    private $metadataHydrator;

    /**
     * @var AttachmentHydrator
     */
    private $attachmentsHydrator;

    /**
     * @var CounterpartyHydrator
     */
    private $counterpartyHydrator;

    /**
     * @var MerchantHydrator
     */
    private $merchantHydrator;

    /**
     * TransactionHydrator constructor.
     * @param MetadataHydrator $metadataHydrator
     * @param AttachmentHydrator $attachmentsHydrator
     * @param CounterpartyHydrator $counterpartyHydrator
     * @param MerchantHydrator $merchantHydrator
     */
    public function __construct(
        MetadataHydrator $metadataHydrator,
        AttachmentHydrator $attachmentsHydrator,
        CounterpartyHydrator $counterpartyHydrator,
        MerchantHydrator $merchantHydrator
    ) {
    
        $this->metadataHydrator = $metadataHydrator;
        $this->attachmentsHydrator = $attachmentsHydrator;
        $this->counterpartyHydrator = $counterpartyHydrator;
        $this->merchantHydrator = $merchantHydrator;
    }


    /**
     * @param \stdClass $dto
     * @return TransactionVO
     */
    public function hydrate(\stdClass $dto): TransactionVO
    {
        return new TransactionVO(
            $dto->id,
            DateTimeImmutable::createFromFormat(self::DATE_FORMAT, $dto->created),
            $dto->description,
            $dto->amount,
            $dto->currency,
            $dto->merchant ? $this->merchantHydrator->hydrate($dto->merchant) : null,
            $dto->notes,
            $this->metadataHydrator->hydrate($dto->metadata),
            $dto->account_balance,
            $this->attachmentsHydrator->hydrate($dto->attachments),
            $dto->category,
            $dto->is_load,
            $dto->settled,
            $dto->local_amount,
            $dto->local_currency,
            $dto->updated,
            $dto->account_id,
            $this->counterpartyHydrator->hydrate($dto->counterparty),
            $dto->scheme,
            $dto->dedupe_id,
            $dto->originator,
            $dto->include_in_spending
        );
    }
}
