<?php

namespace src\commands\command;

use src\commands\command_ex\ServeCommandExecute;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ServeCommand extends Command
{

    protected static $defaultName = "serve";

    protected function configure()
    {
        $this->setDescription('create php development server');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
       $output->writeln("Starting php dev server on localhost");
       ServeCommandExecute::serve();
       return Command::SUCCESS;
    }

}