<?php

namespace AppBundle\CommandBus;

use AppBundle\Entity\MonthlyLimit;
use AppBundle\Entity\AccountRepository;
use AppBundle\Entity\MonthlyLimitRepository;
use AppBundle\Entity\TagRepository;
use SimpleBus\Message\Handler\MessageHandler;
use SimpleBus\Message\Message;

class CreateMonthlyLimitHandler implements MessageHandler
{
    /**
     * @var AccountRepository
     */
    private $accountRepository;

    /**
     * @var MonthlyLimitRepository
     */
    private $monthlyLimitRepository;

    /**
     * @var TagRepository
     */
    private $tagRepository;

    /**
     * @param AccountRepository      $accountRepository
     * @param MonthlyLimitRepository $monthlyLimitRepository
     * @param TagRepository          $tagRepository
     */
    public function __construct(
        AccountRepository $accountRepository,
        MonthlyLimitRepository $monthlyLimitRepository,
        TagRepository $tagRepository
    )
    {
        $this->accountRepository = $accountRepository;
        $this->monthlyLimitRepository = $monthlyLimitRepository;
        $this->tagRepository = $tagRepository;
    }

    /**
     * {@inheritDoc}
     */
    public function handle(Message $message)
    {
        $account = $this->accountRepository->findByName($message->accountName);
        $tag = $this->tagRepository->findByName($message->tagName);
        $monthlyLimit = new MonthlyLimit($account, $tag, $message->amount);
        $this->monthlyLimitRepository->persist($monthlyLimit);
    }
}
