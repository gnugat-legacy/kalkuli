<?php

namespace AppBundle\CommandBus;

use AppBundle\Entity\AccountRepository;
use SimpleBus\Message\Handler\MessageHandler;
use SimpleBus\Message\Message;

class SetDefaultAccountHandler implements MessageHandler
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
     * @param Message $message
     */
    public function handle(Message $message)
    {
        $newDefaultAccount = $this->accountRepository->findByName($message->accountName);
        if ($newDefaultAccount->isDefault()) {
            return;
        }
        $newDefaultAccount->toggleDefault();
        $oldDefaultAccount = $this->accountRepository->findDefault();
        $oldDefaultAccount->toggleDefault();
        $this->accountRepository->persist($oldDefaultAccount);
        $this->accountRepository->persist($newDefaultAccount);
    }
}
