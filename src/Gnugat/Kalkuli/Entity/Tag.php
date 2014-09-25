<?php

namespace Gnugat\Kalkuli\Entity;

class Tag
{
    /**
     * @var string
     */
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}
