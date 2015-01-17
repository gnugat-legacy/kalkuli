<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

class AccountRepository extends EntityRepository
{
    /**
     * @return int
     */
    public function count()
    {
        $accounts = $this->findAll();

        return count($accounts);
    }

    /**
     * @param string $name
     *
     * @return Account
     */
    public function findByName($name)
    {
        return $this->findOneBy(array('name' => $name));
    }

    /**
     * @return Account
     */
    public function findDefault()
    {
        return $this->findOneBy(array('isDefault' => true));
    }

    /**
     * @param Account $account
     */
    public function persist(Account $account)
    {
        $this->_em->persist($account);
        $this->_em->flush();
    }
}
