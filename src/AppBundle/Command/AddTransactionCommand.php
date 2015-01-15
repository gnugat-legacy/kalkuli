<?php

namespace AppBundle\Command;

use AppBundle\CommandBus\CreateTransaction;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AddTransactionCommand extends ContainerAwareCommand
{
    /**
     * {@inheritDoc}
     */
    protected function configure()
    {
        $this->setName('add:transaction');
        $this->setDescription('Creates a transaction');
        $this->addArgument('label', InputArgument::REQUIRED);
        $this->addArgument('amount', InputArgument::REQUIRED);

        $this->addArgument('account-name', InputArgument::REQUIRED);
        $this->addOption('date', 'd', InputOption::VALUE_REQUIRED, '', date('Y-m-d'));
    }

    /**
     * {@inheritDoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $command = new CreateTransaction(
            $input->getArgument('label'),
            $input->getArgument('amount'),
            $input->getArgument('account-name'),
            $input->getOption('date')
        );

        $this->getContainer()->get('command_bus')->handle($command);
    }
}
