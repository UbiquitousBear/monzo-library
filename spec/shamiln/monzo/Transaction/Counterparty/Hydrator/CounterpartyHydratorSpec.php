<?php

namespace spec\shamiln\monzo\Transaction\Counterparty\Hydrator;

use shamiln\monzo\Transaction\Counterparty\Hydrator\CounterpartyHydrator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CounterpartyHydratorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(CounterpartyHydrator::class);
    }
}
