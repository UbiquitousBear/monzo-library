<?php

namespace shamiln\monzo\Transaction\Counterparty\Hydrator;

use shamiln\monzo\Transaction\Counterparty\Counterparty;

class CounterpartyHydrator
{
    /**
     * @param \stdClass $dto
     * @return Counterparty
     */
    public function hydrate(\stdClass $dto): Counterparty
    {
        return new Counterparty();
    }
}
