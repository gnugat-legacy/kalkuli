<?php

namespace Gnugat\Kalkuli\Repository;

use Gnugat\Kalkuli\Entity\Transaction;

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
