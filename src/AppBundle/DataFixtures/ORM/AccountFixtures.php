<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Account;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;

class AccountFixtures extends AbstractFixture
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $em)
    {
        $account = new Account('Checking');
        $this->addReference('account.checking', $account);
        $em->persist($account);
        $em->flush();
    }
}
