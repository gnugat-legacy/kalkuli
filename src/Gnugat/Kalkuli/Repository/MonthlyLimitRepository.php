<?php

namespace Gnugat\Kalkuli\Repository;

use Gnugat\Kalkuli\Entity\MonthlyLimit;

interface MonthlyLimitRepository
{
    /**
     * @param MonthlyLimit $monthlyLimit
     */
    public function persist(MonthlyLimit $monthlyLimit);
}
