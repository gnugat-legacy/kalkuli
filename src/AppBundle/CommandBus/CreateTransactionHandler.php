<?php

namespace AppBundle\CommandBus;

use AppBundle\Entity\Transaction;
use AppBundle\Entity\AccountRepository;
use AppBundle\Entity\TagMatcherRepository;
use AppBundle\Entity\TransactionRepository;
use SimpleBus\Message\Handler\MessageHandler;
use SimpleBus\Message\Message;

class CreateTransactionHandler implements MessageHandler
{
    /**
     * @var AccountRepository
     */
    private $accountRepository;

    /**
     * @var TagMatcherRepository
     */
    private $tagMatcherRepository;

    /**
     * @var TransactionRepository
     */
    private $transactionRepository;

    /**
     * @param AccountRepository     $accountRepository
     * @param TagMatcherRepository  $tagMatcherRepository
     * @param TransactionRepository $transactionRepository
     */
    public function __construct(
        AccountRepository $accountRepository,
        TagMatcherRepository $tagMatcherRepository,
        TransactionRepository $transactionRepository
    )
    {
        $this->accountRepository = $accountRepository;
        $this->tagMatcherRepository = $tagMatcherRepository;
        $this->transactionRepository = $transactionRepository;
    }

    /**
     * {@inheritDoc}
     */
    public function handle(Message $message)
    {
        $account = $this->accountRepository->findByName($message->accountName);
        $transaction = new Transaction($account, $message->date, $message->label, $message->amount);
        $tagMatchers = $this->tagMatcherRepository->findAll();
        foreach ($tagMatchers as $tagMatcher) {
            $tagMatcher->match($transaction);
        }
        $this->transactionRepository->persist($transaction);
    }
}
