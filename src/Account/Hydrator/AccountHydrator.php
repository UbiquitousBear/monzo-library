<?php

namespace shamiln\monzo\Account\Hydrator;

use shamiln\monzo\Account\Account as AccountVO;

class AccountHydrator
{
    /**
     * @param \stdClass $dto
     * @return AccountVO
     */
    public function hydrate(\stdClass $dto): AccountVO
    {
        return new AccountVO(
            $dto->id,
            $dto->description,
            $dto->created
        );
    }
}
