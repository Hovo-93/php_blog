<?php

namespace src\commands\command;

use src\commands\command_ex\MakeControllerCommandExecute;
use src\commands\command_ex\MakeModelCommandExecute;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MakeControllerCommand extends Command
{

    protected static $defaultName = 'make:controller';

    protected function configure()
    {
        $this->addArgument('controller_name', InputArgument::REQUIRED, 'The controller name');
        //InputArgument::REQUIRED, nshanakum e mer depqum controlleri anune grele partadir e
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $controller_name = $input->getArgument('controller_name');//consloi mej input erac controlleri anunenq stanum
//        $output->writeln(MakeModelCommandExecute::create($controller_name));

        if(MakeControllerCommandExecute::create($controller_name)){
            $output->writeln("$controller_name  has been created successfully");
            return Command::SUCCESS;
        }
        $output->writeln("$controller_name controller alredy exists");
        return Command::FAILURE;
    }
}