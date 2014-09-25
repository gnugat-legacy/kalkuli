<?php

namespace spec\Gnugat\Kalkuli\Command;

use Gnugat\Kalkuli\Command\Command;
use Gnugat\Kalkuli\Repository\AccountRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AddAccountCommandSpec extends ObjectBehavior
{
    const NAME = 'Livret A';

    function let(AccountRepository $accountRepository)
    {
        $this->beConstructedWith($accountRepository);
    }

    function it_is_a_command()
    {
        $this->shouldImplement('Gnugat\Kalkuli\Command\Command');
    }

    function it_creates_a_new_account(AccountRepository $accountRepository)
    {
        $account = 'Gnugat\Kalkuli\Entity\Account';
        $accountRepository->persist(Argument::type($account))->shouldBeCalled();

        $this->run(self::NAME)->shouldBe(Command::EXIT_SUCCESS);
    }
}
