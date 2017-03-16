<?php

namespace spec\shamiln\monzo\Balance;

use shamiln\monzo\Balance\BalanceHydrator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use shamiln\monzo\Balance\Balance;

class BalanceHydratorSpec extends ObjectBehavior
{
    public function let(
        \stdClass $dto
    )
    {
        $dto->balance = 100;
        $dto->currency = 'GBP';
        $dto->spend_today = 0;
    }

    public function it_can_parse_a_dto
    (
        $dto
    )
    {
        $this->hydrate($dto)->shouldBeAnInstanceOf(Balance::class);
    }
}
