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
        $defaultAccount = new Account('Default');
        $defaultAccount->toggleDefault();
        $this->addReference('account.default', $defaultAccount);
        $em->persist($defaultAccount);

        $checking = new Account('Checking');
        $this->addReference('account.checking', $checking);
        $em->persist($checking);

        $em->flush();
    }
}
