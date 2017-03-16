<?php

namespace shamiln\monzo\Transaction\Metadata\Hydrator;

use shamiln\monzo\Transaction\Metadata\Metadata;

class MetadataHydrator
{
    /**
     * @param \stdClass $dto
     * @return Metadata
     */
    public function hydrate(\stdClass $dto): Metadata
    {
        return new Metadata();
    }
}
