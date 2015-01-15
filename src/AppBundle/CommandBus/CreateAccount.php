<?php

namespace AppBundle\CommandBus;

use SimpleBus\Message\Type\Command;

class CreateAccount implements Command
{
    /**
     * @var string
     */
    public $name;

    /**
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }
}
