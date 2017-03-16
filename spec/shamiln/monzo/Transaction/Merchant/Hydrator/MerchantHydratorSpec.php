<?php

namespace spec\shamiln\monzo\Transaction\Merchant\Hydrator;

use shamiln\monzo\Transaction\Merchant\Address\Address;
use shamiln\monzo\Transaction\Merchant\Address\Hydrator\AddressHydrator;
use PhpSpec\ObjectBehavior;
use shamiln\monzo\Transaction\Merchant\Merchant;
use shamiln\monzo\Transaction\Merchant\Metadata\Hydrator\MetadataHydrator;
use shamiln\monzo\Transaction\Merchant\Metadata\Metadata;

class MerchantHydratorSpec extends ObjectBehavior
{
    function let(
        AddressHydrator $addressHydrator,
        MetadataHydrator $metadataHydrator,
        Address $address,
        Metadata $metadata
    )
    {
        $addressHydrator->hydrate(new \stdClass())->willReturn($address);
        $metadataHydrator->hydrate(new \stdClass())->willReturn($metadata);

        $this->beConstructedWith($addressHydrator, $metadataHydrator);
    }

    public function it_can_hydrate_from_a_dto(
        \stdClass $dto
    ) {

        $dto->id = 1121;
        $dto->group_id= '';
        $dto->created= '';
        $dto->name= '';
        $dto->logo= '';
        $dto->emoji= '';
        $dto->category= '';
        $dto->online= '';
        $dto->atm= '';
        $dto->address = new \stdClass();
        $dto->updated= '';
        $dto->metadata = new \stdClass();
        $dto->disable_feedback = '';

        $this->hydrate($dto)->shouldBeAnInstanceOf(Merchant::class);
    }
}
