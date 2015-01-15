<?php

namespace Gnugat\Kalkuli\Tests\Command;

use AppBundle\Console\TestApplication;
use PHPUnit_Framework_TestCase;
use Symfony\Component\Console\Input\ArrayInput;

class AddTransactionCommandTest extends PHPUnit_Framework_TestCase
{
    private $app;

    protected function setUp()
    {
        $this->app = new TestApplication();
    }

    public function testCreatesATransaction()
    {
        $input = new ArrayInput(array(
            'add:transaction',
            'label' => 'Tesco',
            'amount' => '-13.37€',
            'account-name' => 'Checking',
            '-d' => '2014-01-25',
        ));

        $exitCode = $this->app->run($input);

        $this->assertSame(0, $exitCode, $this->app->getDisplay());
    }
}
