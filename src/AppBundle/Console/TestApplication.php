<?php

namespace AppBundle\Console;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\StreamOutput;

class TestApplication
{
    /**
     * @var \Symfony\Component\HttpKernel\HttpKernelInterface
     */
    private $kernel;

    /**
     * @var \Symfony\Component\DependencyInjection\ContainerInterface
     */
    private $container;

    /**
     * @var \Symfony\Component\Console\Output\OutputInterface
     */
    private $output;

    public function __construct()
    {
        $this->kernel = new \AppKernel('test', false);
        $this->container = $this->kernel->getContainer();
        $this->output = new StreamOutput(fopen('php://memory', 'w', false));
    }

    public function run(InputInterface $input)
    {
        $application = new Application($this->kernel);
        $application->setAutoExit(false);

        return $application->run($input, $this->output);
    }

    /**
     * @return string
     */
    public function getDisplay()
    {
        rewind($this->output->getStream());

        return stream_get_contents($this->output->getStream());
    }

    /**
     * @return \Symfony\Component\DependencyInjection\ContainerInterface
     */
    public function getContainer()
    {
        return $this->container;
    }
}
