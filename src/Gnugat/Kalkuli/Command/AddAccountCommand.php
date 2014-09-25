<?php

namespace Gnugat\Kalkuli\Command;

use Gnugat\Kalkuli\Entity\Account;
use Gnugat\Kalkuli\Repository\AccountRepository;

class AddAccountCommand implements Command
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
     * @param string $name
     *
     * @return int
     */
    public function run($name)
    {
        $account = new Account($name);
        $this->accountRepository->persist($account);

        return Command::EXIT_SUCCESS;
    }
}
