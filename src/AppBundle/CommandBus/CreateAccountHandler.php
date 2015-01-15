<?php

namespace AppBundle\CommandBus;

use AppBundle\Entity\Account;
use AppBundle\Entity\AccountRepository;
use SimpleBus\Message\Handler\MessageHandler;
use SimpleBus\Message\Message;

class CreateAccountHandler implements MessageHandler
{
    /**
     * @var AccountRepository
     */
    private $accountRepository;

    /**
     * @param AccountRepository $accountRepository
     */
    public function __construct(AccountRepository $accountRepository)
    {
        $this->accountRepository = $accountRepository;
    }

    /**
     * {@inheritDoc}
     */
    public function handle(Message $message)
    {
        $account = new Account($message->name);
        $this->accountRepository->persist($account);
    }
}
