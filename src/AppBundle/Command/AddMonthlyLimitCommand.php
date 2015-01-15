<?php

namespace AppBundle\Command;

use AppBundle\CommandBus\CreateMonthlyLimit;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AddMonthlyLimitCommand extends ContainerAwareCommand
{
    /**
     * {@inheritDoc}
     */
    protected function configure()
    {
        $this->setName('add:monthly-limit');
        $this->setDescription('Creates a monthly limit');
        $this->addArgument('tag-name', InputArgument::REQUIRED);
        $this->addArgument('amount', InputArgument::REQUIRED);

        $this->addArgument('account-name', InputArgument::REQUIRED);
    }

    /**
     * {@inheritDoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $command = new CreateMonthlyLimit(
            $input->getArgument('tag-name'),
            $input->getArgument('amount'),
            $input->getArgument('account-name')
        );

        $this->getContainer()->get('command_bus')->handle($command);
    }
}
