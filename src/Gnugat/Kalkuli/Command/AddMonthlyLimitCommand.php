<?php

namespace Gnugat\Kalkuli\Command;

use Gnugat\Kalkuli\Entity\MonthlyLimit;
use Gnugat\Kalkuli\Repository\AccountRepository;
use Gnugat\Kalkuli\Repository\MonthlyLimitRepository;
use Gnugat\Kalkuli\Repository\TagRepository;

class AddMonthlyLimitCommand implements Command
{
    /**
     * @var AccountRepository
     */
    private $accountRepository;

    /**
     * @var TagRepository
     */
    private $tagRepository;

    /**
     * @var MonthlyLimitRepository
     */
    private $monthlyLimitRepository;

    /**
     * @param AccountRepository      $accountRepository
     * @param TagRepository          $tagRepository
     * @param MonthlyLimitRepository $monthlyLimitRepository
     */
    public function __construct(
        AccountRepository $accountRepository,
        TagRepository $tagRepository,
        MonthlyLimitRepository $monthlyLimitRepository
    )
    {
        $this->accountRepository = $accountRepository;
        $this->tagRepository = $tagRepository;
        $this->monthlyLimitRepository = $monthlyLimitRepository;
    }

    /**
     * @param string $accountName
     * @param string $tagName
     * @param string $amount
     *
     * @return int
     */
    public function run($accountName, $tagName, $amount)
    {
        $account = $this->accountRepository->findByName($accountName);
        $tag = $this->tagRepository->findByName($tagName);
        $monthlyLimit = new MonthlyLimit($account, $tag, $amount);
        $this->monthlyLimitRepository->persist($monthlyLimit);

        return Command::EXIT_SUCCESS;
    }
}
