<?php
namespace shamiln\monzo\Transaction\Repository;

use shamiln\monzo\Account\Account;
use shamiln\monzo\Transaction\TransactionCollection;

interface Transactions
{

    /**
     * @param Account $account
     * @return TransactionCollection
     */
    public function fetchAll(Account $account): TransactionCollection;
}
