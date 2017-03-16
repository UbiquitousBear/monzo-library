<?php

namespace spec\shamiln\monzo\Transaction\Attachment\Hydrator;

use shamiln\monzo\Transaction\Attachment\Attachment;
use shamiln\monzo\Transaction\Attachment\Hydrator\AttachmentHydrator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AttachmentHydratorSpec extends ObjectBehavior
{
    public function it_can_hydrate_an_attachment()
    {
        $this->hydrate([])->shouldReturnAnInstanceOf(Attachment::class);
    }
}
