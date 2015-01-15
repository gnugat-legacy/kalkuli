<?php

namespace spec\AppBundle\CommandBus;

use AppBundle\CommandBus\CreateMonthlyLimit;
use AppBundle\Entity\Account;
use AppBundle\Entity\Tag;
use AppBundle\Entity\AccountRepository;
use AppBundle\Entity\MonthlyLimitRepository;
use AppBundle\Entity\TagRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CreateMonthlyLimitHandlerSpec extends ObjectBehavior
{
    const ACCOUNT_NAME = 'Checking';
    const TAG_NAME = 'Groceries';
    const AMOUNT = '-13.13€';

    function let(
        AccountRepository $accountRepository,
        MonthlyLimitRepository $monthlyLimitRepository,
        TagRepository $tagRepository
    )
    {
        $this->beConstructedWith($accountRepository, $monthlyLimitRepository, $tagRepository);
    }

    function it_creates_a_new_monthly_limit(
        AccountRepository $accountRepository,
        Account $account,
        TagRepository $tagRepository,
        Tag $tag,
        MonthlyLimitRepository $monthlyLimitRepository
    )
    {
        $createMonthlyLimit = new CreateMonthlyLimit(self::TAG_NAME, self::AMOUNT, self::ACCOUNT_NAME);

        $accountRepository->findByName(self::ACCOUNT_NAME)->willReturn($account);
        $tagRepository->findByName(self::TAG_NAME)->willReturn($tag);
        $monthlyLimit = 'AppBundle\Entity\MonthlyLimit';
        $monthlyLimitRepository->persist(Argument::type($monthlyLimit))->shouldBeCalled();

        $this->handle($createMonthlyLimit);
    }
}
