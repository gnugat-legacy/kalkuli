<?php

namespace spec\AppBundle\CommandBus;

use AppBundle\CommandBus\SetDefaultAccount;
use AppBundle\Entity\Account;
use AppBundle\Entity\AccountRepository;
use PhpSpec\ObjectBehavior;

class SetDefaultAccountHandlerSpec extends ObjectBehavior
{
    const ACCOUNT_NAME = 'Checking';

    function let(AccountRepository $accountRepository)
    {
        $this->beConstructedWith($accountRepository);
    }

    function it_sets_the_default_account(
        Account $oldDefaultAccount,
        Account $newDefaultAccount,
        AccountRepository $accountRepository
    )
    {
        $setAccount = new SetDefaultAccount(self::ACCOUNT_NAME);

        $accountRepository->findByName(self::ACCOUNT_NAME)->willReturn($newDefaultAccount);
        $newDefaultAccount->isDefault()->willReturn(false);
        $accountRepository->findDefault()->willReturn($oldDefaultAccount);
        $oldDefaultAccount->toggleDefault()->shouldBeCalled();
        $newDefaultAccount->toggleDefault()->shouldBeCalled();
        $accountRepository->persist($oldDefaultAccount)->shouldBeCalled();
        $accountRepository->persist($newDefaultAccount)->shouldBeCalled();

        $this->handle($setAccount);
    }

    function it_checks_if_the_account_is_already_the_default_one(
        Account $oldDefaultAccount,
        Account $newDefaultAccount,
        AccountRepository $accountRepository
    )
    {
        $setAccount = new SetDefaultAccount(self::ACCOUNT_NAME);

        $accountRepository->findByName(self::ACCOUNT_NAME)->willReturn($newDefaultAccount);
        $newDefaultAccount->isDefault()->willReturn(true);
        $newDefaultAccount->toggleDefault()->shouldNotBeCalled();
        $accountRepository->persist($newDefaultAccount)->shouldNotBeCalled();

        $this->handle($setAccount);
    }
}
