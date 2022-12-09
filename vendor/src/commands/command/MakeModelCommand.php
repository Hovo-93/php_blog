<?php

namespace src\commands\command;

use src\commands\command_ex\MakeModelCommandExecute;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MakeModelCommand extends Command
{

    protected static $defaultName = "make:model";

    public function configure()
    {
        $this->addArgument('model_name', InputArgument::REQUIRED, 'The model name');
    }


    public function execute(InputInterface $input, OutputInterface $output)
    {
        $model_name = $input->getArgument('model_name');

        if(MakeModelCommandExecute::create($model_name)){
            $output->writeln("$model_name model has been created successfully");
            return Command::SUCCESS;
        }
        $output->writeln("$model_name model alredy exists");
        return Command::FAILURE;

    }

}