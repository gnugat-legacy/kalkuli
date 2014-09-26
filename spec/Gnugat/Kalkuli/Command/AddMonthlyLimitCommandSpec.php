<?php

namespace spec\Gnugat\Kalkuli\Command;

use Gnugat\Kalkuli\Command\Command;
use Gnugat\Kalkuli\Entity\Account;
use Gnugat\Kalkuli\Entity\Tag;
use Gnugat\Kalkuli\Repository\AccountRepository;
use Gnugat\Kalkuli\Repository\MonthlyLimitRepository;
use Gnugat\Kalkuli\Repository\TagRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AddMonthlyLimitCommandSpec extends ObjectBehavior
{
    const ACCOUNT_NAME = 'Compte Courant';
    const TAG_NAME = 'groceries';
    const AMOUNT = '13.13€';

    function let(
        AccountRepository $accountRepository,
        TagRepository $tagRepository,
        MonthlyLimitRepository $monthlyLimitRepository
    )
    {
        $this->beConstructedWith($accountRepository, $tagRepository, $monthlyLimitRepository);
    }

    function it_is_a_command()
    {
        $this->shouldImplement('Gnugat\Kalkuli\Command\Command');
    }

    function it_creates_a_new_monthly_limit(
        AccountRepository $accountRepository,
        Account $account,
        TagRepository $tagRepository,
        Tag $tag,
        MonthlyLimitRepository $monthlyLimitRepository
    )
    {
        $accountRepository->findByName(self::ACCOUNT_NAME)->willReturn($account);
        $tagRepository->findByName(self::TAG_NAME)->willReturn($tag);
        $monthlyLimit = 'Gnugat\Kalkuli\Entity\MonthlyLimit';
        $monthlyLimitRepository->persist(Argument::type($monthlyLimit))->shouldBeCalled();

        $this->run(self::ACCOUNT_NAME, self::TAG_NAME, self::AMOUNT)->shouldBe(Command::EXIT_SUCCESS);
    }
}
