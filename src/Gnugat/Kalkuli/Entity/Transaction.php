<?php

namespace Gnugat\Kalkuli\Entity;

class Transaction
{
    /**
     * @var Account
     */
    private $account;

    /**
     * @var string
     */
    private $date;

    /**
     * @var string
     */
    private $label;

    /**
     * @var string
     */
    private $amount;

    /**
     * @param Account $account
     * @param string  $date
     * @param string  $label
     * @param string  $amount
     */
    public function __construct(Account $account, $date, $label, $amount)
    {
        $this->account = $account;
        $this->date = $date;
        $this->label = $label;
        $this->amount = $amount;
    }
}
