<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

class TransactionRepository extends EntityRepository
{
    /**
     * @param string $label
     *
     * @return Transaction
     */
    public function findByLabel($label)
    {
        return $this->findOneBy(array('label' => $label));
    }

    /**
     * @param Transaction $transaction
     */
    public function persist(Transaction $transaction)
    {
        $this->_em->persist($transaction);
        $this->_em->flush();
    }
}
