<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Transaction;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;

class TransactionFixtures extends AbstractFixture
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $em)
    {
        $account = $this->getReference('account.checking');
        $transaction = new Transaction($account, '13.37€', '2014-01-21', 'Tesco');
        $this->addReference('tag.tesco_2014_01_21', $transaction);
        $em->persist($transaction);
        $em->flush();
    }
}
