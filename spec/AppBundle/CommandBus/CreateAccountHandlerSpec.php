<?php

namespace spec\AppBundle\CommandBus;

use AppBundle\CommandBus\CreateAccount;
use AppBundle\Entity\Account;
use AppBundle\Entity\AccountFactory;
use AppBundle\Entity\AccountRepository;
use PhpSpec\ObjectBehavior;

class CreateAccountHandlerSpec extends ObjectBehavior
{
    const NAME = 'Checking';

    function let(AccountFactory $accountFactory, AccountRepository $accountRepository)
    {
        $this->beConstructedWith($accountFactory, $accountRepository);
    }

    function it_creates_a_new_account(
        Account $account,
        AccountFactory $accountFactory,
        AccountRepository $accountRepository
    )
    {
        $createAccount = new CreateAccount(self::NAME);

        $accountFactory->make(self::NAME)->willReturn($account);
        $accountRepository->persist($account)->shouldBeCalled();

        $this->handle($createAccount);
    }
}
