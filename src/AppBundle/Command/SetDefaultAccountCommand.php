<?php

namespace AppBundle\Command;

use AppBundle\CommandBus\SetDefaultAccount;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SetDefaultAccountCommand extends ContainerAwareCommand
{
    /**
     * {@inheritDoc}
     */
    protected function configure()
    {
        $this->setName('set:default-account');
        $this->setDescription('Sets the default account');
        $this->addArgument('account-name', InputArgument::REQUIRED);
    }

    /**
     * {@inheritDoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $command = new SetDefaultAccount(
            $input->getArgument('account-name')
        );

        $this->getContainer()->get('command_bus')->handle($command);
    }
}
