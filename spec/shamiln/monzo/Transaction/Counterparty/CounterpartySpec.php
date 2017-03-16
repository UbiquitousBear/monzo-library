<?php

namespace spec\shamiln\monzo\Transaction\Counterparty;

use shamiln\monzo\Transaction\Counterparty\Counterparty;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CounterpartySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Counterparty::class);
    }
}
