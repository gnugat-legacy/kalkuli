<?php

namespace Gnugat\Kalkuli\Tests\Command;

use AppBundle\Console\TestApplication;
use PHPUnit_Framework_TestCase;
use Symfony\Component\Console\Input\ArrayInput;

class SetDefaultAccountCommandTest extends PHPUnit_Framework_TestCase
{
    private $app;

    protected function setUp()
    {
        $this->app = new TestApplication();
    }

    public function testSetsAccountAsDefault()
    {
        $input = new ArrayInput(array(
            'set:default-account',
            'account-name' => 'Checking',
        ));

        $exitCode = $this->app->run($input);

        $this->assertSame(0, $exitCode, $this->app->getDisplay());
    }

    public function testDoesNotSetAccountAsDefaultIfItAlreadyIs()
    {
        $input = new ArrayInput(array(
            'set:default-account',
            'account-name' => 'Default',
        ));

        $exitCode = $this->app->run($input);

        $this->assertSame(0, $exitCode, $this->app->getDisplay());
    }
}
