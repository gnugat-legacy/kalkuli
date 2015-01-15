<?php

namespace AppBundle\CommandBus;

use SimpleBus\Message\Type\Command;

class CreateTransaction implements Command
{
    /**
     * @var string
     */
    public $label;

    /**
     * @var string
     */
    public $amount;

    /**
     * @var string
     */
    public $accountName;

    /**
     * @var string
     */
    public $date;

    /**
     * @param string $label
     * @param string $amount
     * @param string $accountName
     * @param string $date
     */
    public function __construct($label, $amount, $accountName, $date)
    {
        $this->label = $label;
        $this->amount = $amount;
        $this->accountName = $accountName;
        $this->date = $date;
    }
}
