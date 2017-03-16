<?php

namespace shamiln\monzo\Transaction\Merchant\Hydrator;

use shamiln\monzo\Transaction\Merchant\Address\Hydrator\AddressHydrator;
use shamiln\monzo\Transaction\Merchant\Merchant;
use shamiln\monzo\Transaction\Merchant\Metadata\Hydrator\MetadataHydrator;

class MerchantHydrator
{

    /**
     * @var AddressHydrator
     */
    private $addressHydrator;

    /**
     * @var MetadataHydrator
     */
    private $metadataHydrator;

    /**
     * MerchantHydrator constructor.
     * @param AddressHydrator $addressHydrator
     * @param MetadataHydrator $metadataHydrator
     */
    public function __construct(
        AddressHydrator $addressHydrator,
        MetadataHydrator $metadataHydrator
    ) {
    
        $this->addressHydrator = $addressHydrator;
        $this->metadataHydrator = $metadataHydrator;
    }


    /**
     * @param \stdClass $dto
     * @return Merchant
     */
    public function hydrate($dto): Merchant
    {
        return new Merchant(
            $dto->id,
            $dto->group_id,
            $dto->created,
            $dto->name,
            $dto->logo,
            $dto->emoji,
            $dto->category,
            $dto->online,
            $dto->atm,
            $dto->address ? $this->addressHydrator->hydrate($dto->address) : null,
            $dto->updated,
            $dto->metadata ? $this->metadataHydrator->hydrate($dto->metadata) : null,
            $dto->disable_feedback
        );
    }
}
