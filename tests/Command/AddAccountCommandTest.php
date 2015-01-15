<?php

namespace Gnugat\Kalkuli\Tests\Command;

use AppBundle\Console\TestApplication;
use PHPUnit_Framework_TestCase;
use Symfony\Component\Console\Input\ArrayInput;

class AddAccountCommandTest extends PHPUnit_Framework_TestCase
{
    private $app;

    protected function setUp()
    {
        $this->app = new TestApplication();
    }

    public function testCreatesAnAccount()
    {
        $input = new ArrayInput(array(
            'add:account',
            'name' => 'Savings',
        ));

        $exitCode = $this->app->run($input);

        $this->assertSame(0, $exitCode, $this->app->getDisplay());
    }
}
