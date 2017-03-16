<?php
namespace shamiln\monzo\Transaction\Merchant\Address\Hydrator;

use shamiln\monzo\Transaction\Merchant\Address\Address;

class AddressHydrator
{
    /**
     * @param \stdClass $dto
     * @return Address
     */
    public function hydrate(\stdClass $dto): Address
    {
        return new Address(
            $dto->short_formatted,
            $dto->formatted,
            $dto->address,
            $dto->city,
            $dto->region,
            $dto->country,
            $dto->postcode,
            $dto->longitude,
            $dto->latitude,
            $dto->zoom_level,
            $dto->approximate
        );
    }
}
