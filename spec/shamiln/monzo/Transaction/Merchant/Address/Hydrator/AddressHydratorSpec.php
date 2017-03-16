<?php

namespace spec\shamiln\monzo\Transaction\Merchant\Address\Hydrator;

use shamiln\monzo\Transaction\Merchant\Address\Address;
use shamiln\monzo\Transaction\Merchant\Address\Hydrator\AddressHydrator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AddressHydratorSpec extends ObjectBehavior
{

    public function let(
        \stdClass $dto
    )
    {
        $dto->short_formatted = '';
        $dto->formatted = '';
        $dto->address = '';
        $dto->city = '';
        $dto->region = '';
        $dto->country = '';
        $dto->postcode = '';
        $dto->latitude = 2.10;
        $dto->longitude = 1.101;
        $dto->zoom_level = 2;
        $dto->approximate = false;
    }

    public function it_should_hydrate_from_dto
    (
        $dto
    )
    {
        $this->hydrate($dto)->shouldBeAnInstanceOf(Address::class);
    }
}
