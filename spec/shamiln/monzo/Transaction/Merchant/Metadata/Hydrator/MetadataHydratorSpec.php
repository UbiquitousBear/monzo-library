<?php

namespace spec\shamiln\monzo\Transaction\Merchant\Metadata\Hydrator;

use shamiln\monzo\Transaction\Merchant\Metadata\Hydrator\MetadataHydrator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MetadataHydratorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(MetadataHydrator::class);
    }
}
