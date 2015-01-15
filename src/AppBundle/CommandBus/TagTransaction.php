<?php

namespace AppBundle\CommandBus;

use SimpleBus\Message\Type\Command;

class TagTransaction implements Command
{
    /**
     * @var string
     */
    public $tagName;

    /**
     * @var string
     */
    public $transactionLabel;

    /**
     * @param string $tagName
     * @param string $transactionLabel
     */
    public function __construct($tagName, $transactionLabel)
    {
        $this->tagName = $tagName;
        $this->transactionLabel = $transactionLabel;
    }
}
