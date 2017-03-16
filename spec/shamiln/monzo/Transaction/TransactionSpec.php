<?php

namespace spec\shamiln\monzo\Transaction;

use shamiln\monzo\Transaction\Transaction;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TransactionSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(
            'tx_000097CKaZZ1j22h83JPkX',
            '2016-04-14T18:24:26.333Z',
            'NW CARD SERVICES       WESTCLIFF-ON- GBR',
            '-100',
            'GBP',
            [],
            '',
            [],
            '9900',
            [],
            'bills',
            '',
            '',
            '-100',
            'GBP',
            '2016-04-14T18:24:27.078Z',
            'acc_000096rK41NzBOnziebtR3',
            [],
            'gps_mastercard',
            '708656620160414055900002515',
            '',
            '1'
        );
    }

}
