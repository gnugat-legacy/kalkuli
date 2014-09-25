<?php

namespace Gnugat\Kalkuli\Repository;

use Gnugat\Kalkuli\Entity\Transaction;

/**
 * Takes care of the persistence of Transaction.
 */
interface TransactionRepository
{
    public function persist(Transaction $transaction);
}
