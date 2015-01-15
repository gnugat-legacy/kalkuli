<?php

namespace AppBundle\Command;

use AppBundle\CommandBus\CreateTagMatcher;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AddTagMatcherCommand extends ContainerAwareCommand
{
    /**
     * {@inheritDoc}
     */
    protected function configure()
    {
        $this->setName('add:tag-matcher');
        $this->setDescription('Creates a tag matcher');
        $this->addArgument('tag-name', InputArgument::REQUIRED);
        $this->addArgument('pattern', InputArgument::REQUIRED);
    }

    /**
     * {@inheritDoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $command = new CreateTagMatcher(
            $input->getArgument('tag-name'),
            $input->getArgument('pattern')
        );

        $this->getContainer()->get('command_bus')->handle($command);
    }
}
