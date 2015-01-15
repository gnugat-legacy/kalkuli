<?php

namespace spec\AppBundle\CommandBus;

use AppBundle\CommandBus\CreateTransaction;
use AppBundle\Entity\Account;
use AppBundle\Entity\TagMatcher;
use AppBundle\Entity\AccountRepository;
use AppBundle\Entity\TagMatcherRepository;
use AppBundle\Entity\TransactionRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CreateTransactionHandlerSpec extends ObjectBehavior
{
    const LABEL = 'Tesco';
    const AMOUNT = '-13.37€';
    const ACCOUNT_NAME = 'Checking';
    const DATE = '2014-01-25';

    function let(
        AccountRepository $accountRepository,
        TagMatcherRepository $tagMatcherRepository,
        TransactionRepository $transactionRepository
    )
    {
        $this->beConstructedWith(
            $accountRepository,
            $tagMatcherRepository,
            $transactionRepository
        );
    }

    function it_creates_a_new_transaction(
        AccountRepository $accountRepository,
        Account $account,
        TransactionRepository $transactionRepository,
        TagMatcherRepository $tagMatcherRepository,
        TagMatcher $tagMatcher
    )
    {
        $createTransaction = new CreateTransaction(self::LABEL, self::AMOUNT, self::ACCOUNT_NAME, self::DATE);

        $accountRepository->findByName(self::ACCOUNT_NAME)->willReturn($account);
        $tagMatcherRepository->findAll()->willReturn(array($tagMatcher));
        $transaction = 'AppBundle\Entity\Transaction';
        $tagMatcher->match(Argument::type($transaction))->shouldBeCalled();
        $transactionRepository->persist(Argument::type($transaction))->shouldBeCalled();

        $this->handle($createTransaction);
    }
}
