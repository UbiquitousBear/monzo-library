<?php

namespace spec\shamiln\monzo\Account;

use shamiln\monzo\Account\Account;
use shamiln\monzo\Account\AccountCollection;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AccountCollectionSpec extends ObjectBehavior
{
    public function let(
        Account $account
    )
    {
        $account->id()->willReturn('acc_00009237aqC8c5umZmrRdh');
        $account->description()->willReturn('Peter Pan\'s Account');
        $account->created()->willReturn('2015-11-13T12:17:42Z');

        $this->beConstructedThroughFromArray([$account]);
    }

    public function it_returns_an_added_account(
        $account
    )
    {
        $this->current()->shouldReturn($account);
    }
}
