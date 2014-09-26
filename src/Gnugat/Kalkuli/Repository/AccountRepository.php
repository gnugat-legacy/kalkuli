<?php

namespace Gnugat\Kalkuli\Repository;

use Gnugat\Kalkuli\Entity\Account;

interface AccountRepository
{
    /**
     * @param string $name
     *
     * @return Account
     */
    public function findByName($name);

    /**
     * @param Account $account
     */
    public function persist(Account $account);
}
