<?php

namespace Gnugat\Kalkuli\Command;

use Date;
use Gnugat\Kalkuli\Entity\Transaction;
use Gnugat\Kalkuli\Repository\AccountRepository;
use Gnugat\Kalkuli\Repository\TagMatcherRepository;
use Gnugat\Kalkuli\Repository\TransactionRepository;

class AddTransactionCommand implements Command
{
    /**
     * @var AccountRepository
     */
    private $accountRepository;

    /**
     * @var TransactionRepository
     */
    private $transactionRepository;

    /**
     * @var TagMatcherRepository
     */
    private $tagMatcherRepository;

    /**
     * @param AccountRepository     $accountRepository
     * @param TransactionRepository $transactionRepository
     * @param TagMatcherRepository  $tagMatcherRepository
     */
    public function __construct(
        AccountRepository $accountRepository,
        TransactionRepository $transactionRepository,
        TagMatcherRepository $tagMatcherRepository
    )
    {
        $this->accountRepository = $accountRepository;
        $this->transactionRepository = $transactionRepository;
        $this->tagMatcherRepository = $tagMatcherRepository;
    }

    /**
     * @param string $label
     * @param string $amount
     * @param string $account
     * @param string $date
     *
     * @return int
     */
    public function run($label, $amount, $account, $date)
    {
        $transaction = new Transaction(
            $this->accountRepository->findByName($account),
            $date,
            $label,
            $amount
        );
        $tagMatchers = $this->tagMatcherRepository->findAll();
        foreach ($tagMatchers as $tagMatcher) {
            $tagMatcher->match($transaction);
        }
        $this->transactionRepository->persist($transaction);

        return Command::EXIT_SUCCESS;
    }
}
