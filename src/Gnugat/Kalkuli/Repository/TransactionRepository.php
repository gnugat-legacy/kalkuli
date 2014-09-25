<?php

namespace Gnugat\Kalkuli\Repository;

use Gnugat\Kalkuli\Entity\Transaction;

/**
 * Takes care of the persistence of Transaction.
 */
interface TransactionRepository
{
    /**
     * @param string $label
     *
     * @return Transaction
     */
    public function findByLabel($label);

    /**
     * @param Transaction $transaction
     */
    public function persist(Transaction $transaction);
}
