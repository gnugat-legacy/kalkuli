<?php

namespace AppBundle\Command;

use AppBundle\CommandBus\CreateTag;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AddTagCommand extends ContainerAwareCommand
{
    /**
     * {@inheritDoc}
     */
    protected function configure()
    {
        $this->setName('add:tag');
        $this->setDescription('Creates a tag');
        $this->addArgument('name', InputArgument::REQUIRED);
    }

    /**
     * {@inheritDoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $command = new CreateTag(
            $input->getArgument('name')
        );

        $this->getContainer()->get('command_bus')->handle($command);
    }
}
