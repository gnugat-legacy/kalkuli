<?php

namespace AppBundle\Command;

use AppBundle\CommandBus\TagTransaction;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TagTransactionCommand extends ContainerAwareCommand
{
    /**
     * {@inheritDoc}
     */
    protected function configure()
    {
        $this->setName('tag:transaction');
        $this->setDescription('Creates a transaction');
        $this->addArgument('tag-name', InputArgument::REQUIRED);
        $this->addArgument('transaction-label', InputArgument::REQUIRED);
    }

    /**
     * {@inheritDoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $command = new TagTransaction(
            $input->getArgument('tag-name'),
            $input->getArgument('transaction-label')
        );

        $this->getContainer()->get('command_bus')->handle($command);
    }
}
