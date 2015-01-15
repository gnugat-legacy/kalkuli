<?php

namespace AppBundle\CommandBus;

use SimpleBus\Message\Type\Command;

class CreateMonthlyLimit implements Command
{
    /**
     * @var string
     */
    public $tagName;

    /**
     * @var string
     */
    public $amount;

    /**
     * @var string
     */
    public $accountName;

    /**
     * @param string $tagName
     * @param string $amount
     * @param string $accountName
     */
    public function __construct($tagName, $amount, $accountName)
    {
        $this->tagName = $tagName;
        $this->amount = $amount;
        $this->accountName = $accountName;
    }
}
