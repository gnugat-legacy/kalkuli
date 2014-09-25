<?php

namespace spec\Gnugat\Kalkuli\Command;

use Gnugat\Kalkuli\Command\Command;
use Gnugat\Kalkuli\Entity\Account;
use Gnugat\Kalkuli\Repository\AccountRepository;
use Gnugat\Kalkuli\Repository\TransactionRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AddTransactionCommandSpec extends ObjectBehavior
{
    const LABEL = 'VIR LC';
    const AMOUNT = '13.37€';
    const ACCOUNT = 'Compte Courant';
    const DATE = '2014-01-25';

    function let(AccountRepository $accountRepository, TransactionRepository $transactionRepository)
    {
        $this->beConstructedWith($accountRepository, $transactionRepository);
    }

    function it_is_a_command()
    {
        $this->shouldImplement('Gnugat\Kalkuli\Command\Command');
    }

    function it_creates_a_new_transaction(
        AccountRepository $accountRepository,
        Account $account,
        TransactionRepository $transactionRepository
    )
    {
        $accountRepository->findByName(self::ACCOUNT)->willReturn($account);
        $transaction = 'Gnugat\Kalkuli\Entity\Transaction';
        $transactionRepository->persist(Argument::type($transaction))->shouldBeCalled();

        $this->run(
            self::LABEL,
            self::AMOUNT,
            self::ACCOUNT,
            self::DATE
        )->shouldBe(Command::EXIT_SUCCESS);
    }
}
