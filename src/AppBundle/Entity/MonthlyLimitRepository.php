<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

class MonthlyLimitRepository extends EntityRepository
{
    /**
     * @param MonthlyLimit $monthlyLimit
     */
    public function persist(MonthlyLimit $monthlyLimit)
    {
        $this->_em->persist($monthlyLimit);
        $this->_em->flush();
    }
}
