<?php

namespace AppBundle\CommandBus;

use SimpleBus\Message\Type\Command;

class CreateTagMatcher implements Command
{
    /**
     * @var string
     */
    public $tagName;

    /**
     * @var string
     */
    public $pattern;

    /**
     * @param string $tagName
     * @param string $pattern
     */
    public function __construct($tagName, $pattern)
    {
        $this->tagName = $tagName;
        $this->pattern = $pattern;
    }
}
