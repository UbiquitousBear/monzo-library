<?php

namespace spec\shamiln\monzo\Transaction;

use shamiln\monzo\Transaction\TransactionCollection;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TransactionCollectionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith([]);
    }
}
