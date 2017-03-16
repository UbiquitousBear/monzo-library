<?php
namespace shamiln\monzo\Balance\Repository;

use shamiln\monzo\Balance\Balance as BalanceVO;
use shamiln\monzo\Account\Account;

interface Balance
{

    /**
     * @param Account $account
     * @return BalanceVO
     */
    public function fetch(Account $account): BalanceVO;
}
