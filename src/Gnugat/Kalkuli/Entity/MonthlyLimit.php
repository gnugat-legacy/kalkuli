<?php

namespace Gnugat\Kalkuli\Entity;

class MonthlyLimit
{
    /**
     * @var Account
     */
    private $account;

    /**
     * @var Tag
     */
    private $tag;

    /**
     * @var string
     */
    private $amount;

    /**
     * @param Account $account
     * @param Tag     $tag
     * @param string  $amount
     */
    public function __construct(Account $account, Tag $tag, $amount)
    {
        $this->account = $account;
        $this->tag = $tag;
        $this->amount = $amount;
    }
}
