<?php

namespace Gnugat\Kalkuli\Tests\Command;

use AppBundle\Console\TestApplication;
use PHPUnit_Framework_TestCase;
use Symfony\Component\Console\Input\ArrayInput;

class AddTagCommandTest extends PHPUnit_Framework_TestCase
{
    private $app;

    protected function setUp()
    {
        $this->app = new TestApplication();
    }

    public function testCreatesATag()
    {
        $input = new ArrayInput(array(
            'add:tag',
            'name' => 'Rent',
        ));

        $exitCode = $this->app->run($input);

        $this->assertSame(0, $exitCode, $this->app->getDisplay());
    }
}
