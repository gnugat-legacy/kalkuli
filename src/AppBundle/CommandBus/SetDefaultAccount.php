<?php

namespace AppBundle\CommandBus;

use SimpleBus\Message\Type\Command;

class SetDefaultAccount implements Command
{
    /**
     * @var string
     */
    public $accountName;

    /**
     * @param string $accountName
     */
    public function __construct($accountName)
    {
        $this->accountName = $accountName;
    }
}
