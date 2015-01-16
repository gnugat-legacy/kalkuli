<?php

namespace AppBundle\CommandBus;

use AppBundle\Entity\Accaccountount;
use AppBundle\Entity\AccountFactory;
use AppBundle\Entity\AccountRepository;
use SimpleBus\Message\Handler\MessageHandler;
use SimpleBus\Message\Message;

class CreateAccountHandler implements MessageHandler
{
    /**
     * @var AccountFactory
     */
    private $accountFactory;

    /**
     * @var AccountRepository
     */
    private $accountRepository;

    /**
     * @param AccountFactory    $accountFactory
     * @param AccountRepository $accountRepository
     */
    public function __construct(AccountFactory $accountFactory, AccountRepository $accountRepository)
    {
        $this->accountFactory = $accountFactory;
        $this->accountRepository = $accountRepository;
    }

    /**
     * {@inheritDoc}
     */
    public function handle(Message $message)
    {
        $account = $this->accountFactory->make($message->name);
        $this->accountRepository->persist($account);
    }
}
