<?php

namespace shamiln\monzo\Transaction\Attachment\Hydrator;

use shamiln\monzo\Transaction\Attachment\Attachment;

class AttachmentHydrator
{
    /**
     * @param \stdClass $dto
     * @return Attachment
     */
    public function hydrate(array $dto): Attachment
    {
        return new Attachment();
    }
}
