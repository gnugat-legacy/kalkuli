<?php

namespace AppBundle\Command;

use AppBundle\CommandBus\CreateAccount;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AddAccountCommand extends ContainerAwareCommand
{
    /**
     * {@inheritDoc}
     */
    protected function configure()
    {
        $this->setName('add:account');
        $this->setDescription('Creates an account');
        $this->addArgument('name', InputArgument::REQUIRED);
    }

    /**
     * {@inheritDoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $command = new CreateAccount(
            $input->getArgument('name')
        );

        $this->getContainer()->get('command_bus')->handle($command);
    }
}
