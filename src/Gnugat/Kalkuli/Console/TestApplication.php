<?php

namespace Gnugat\Kalkuli\Console;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class TestApplication
{
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
        $this->container = new ContainerBuilder();
        $this->container->setParameter('kalkuli.version', 'test');

        $loader = new YamlFileLoader($this->container, new FileLocator(__DIR__.'/../../../../config'));
        $loader->load('services_test.yml');

        $this->output = $this->container->get('symfony_console.output');
    }

    public function run(InputInterface $input)
    {
        $application = $this->container->get('symfony_console.application');
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
