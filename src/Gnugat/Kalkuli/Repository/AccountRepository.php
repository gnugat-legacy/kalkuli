<?php

namespace Gnugat\Kalkuli\Repository;

use Gnugat\Kalkuli\Entity\Account;

/**
 * Takes care of the persistence of Account.
 */
interface AccountRepository
{
    /**
     * @param Account $account
     */
    public function persist(Account $account);
}
