<?php
namespace shamiln\monzo\Account\Repository;

use shamiln\monzo\Account\AccountCollection;

interface Accounts
{
    /**
     * @return AccountCollection
     */
    public function fetchAll(): AccountCollection;
}
