<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

class AccountRepository extends EntityRepository
{
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
        $accounts = $this->findAll();

        return array_shift($accounts);
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
