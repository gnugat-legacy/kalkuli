<?php

namespace AppBundle\Entity;

class AccountFactory
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
     * @return Account
     */
    public function make($name)
    {
        $account = new Account($name);
        if (0 === $this->accountRepository->count()) {
            $account->toggleDefault();
        }

        return $account;
    }
}
