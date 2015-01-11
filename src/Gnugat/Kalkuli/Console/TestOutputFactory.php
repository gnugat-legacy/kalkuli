<?php

namespace Gnugat\Kalkuli\Console;

use Symfony\Component\Console\Output\StreamOutput;

class TestOutputFactory
{
    /**
     * @return StreamOutput
     */
    public function make()
    {
        return new StreamOutput(fopen('php://memory', 'w', false));
    }
}
