<?php

namespace spec\shamiln\monzo\Account\Hydrator;

use shamiln\monzo\Account\Hydrator\AccountHydrator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use shamiln\monzo\Account\Account as AccountVO;

class AccountHydratorSpec extends ObjectBehavior
{
    public function let(
        \stdClass $dto
    )
    {
        $dto->id = 'acc_00009237aqC8c5umZmrRdh';
        $dto->description = 'Peter Pan\'s Account';
        $dto->created = '2015-11-13T12:17:42Z';
    }

    public function it_can_hydrate_from_a_dto
    (
        $dto
    )
    {
        $this->hydrate($dto)->shouldBeAnInstanceOf(AccountVO::class);
    }
}
