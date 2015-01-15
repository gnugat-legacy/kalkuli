<?php

namespace spec\AppBundle\CommandBus;

use AppBundle\CommandBus\CreateAccount;
use AppBundle\Entity\AccountRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CreateAccountHandlerSpec extends ObjectBehavior
{
    const NAME = 'Checking';

    function let(AccountRepository $accountRepository)
    {
        $this->beConstructedWith($accountRepository);
    }

    function it_creates_a_new_account(AccountRepository $accountRepository)
    {
        $createAccount = new CreateAccount(self::NAME);

        $account = Argument::type('AppBundle\Entity\Account');
        $accountRepository->persist($account)->shouldBeCalled();

        $this->handle($createAccount);
    }
}
