<?php

namespace spec\AppBundle\Factory;

use AppBundle\Entity\AccountRepository;
use PhpSpec\ObjectBehavior;

class AccountFactorySpec extends ObjectBehavior
{
    const NAME = 'Checking';

    function let(AccountRepository $accountRepository)
    {
        $this->beConstructedWith($accountRepository);
    }

    function it_creates_first_account_as_default(AccountRepository $accountRepository)
    {
        $accountRepository->count()->willReturn(0);

        $this->make(self::NAME)->isDefault()->shouldBe(true);
    }

    function it_creates_a_new_account(AccountRepository $accountRepository)
    {
        $accountRepository->count()->willReturn(1);

        $this->make(self::NAME)->isDefault()->shouldBe(false);
    }
}
