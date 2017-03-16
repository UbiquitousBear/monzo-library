<?php

namespace shamiln\monzo\Transaction\Merchant\Metadata\Hydrator;

use shamiln\monzo\Transaction\Merchant\Metadata\Metadata;

class MetadataHydrator
{
    /**
     * @param \stdClass $dto
     * @return Metadata
     */
    public function hydrate(\stdClass $dto): Metadata
    {
        return new Metadata(
            $dto->created_for_merchant ?? null,
            $dto->created_for_transaction ?? null,
            $dto->enriched_from_settlement ?? null,
            $dto->suggested_tags ?? null
        );
    }
}
