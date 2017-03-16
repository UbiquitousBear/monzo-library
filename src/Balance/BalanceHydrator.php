<?php

namespace shamiln\monzo\Balance;

use shamiln\monzo\Balance\Balance as BalanceVO;

class BalanceHydrator
{
    /**
     * @param \stdClass $dto
     * @return BalanceVO
     */
    public function hydrate(\stdClass $dto): BalanceVO
    {
        return new BalanceVO(
            $dto->balance,
            $dto->currency,
            $dto->spend_today,
            $dto->local_currency ?? null,
            $dto->local_exchange_rate ?? null,
            $dto->local_spend ?? []
        );
    }
}
