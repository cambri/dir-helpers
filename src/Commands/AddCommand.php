<?php

namespace Hyn\DirHelpers\Commands;

use Hyn\DirHelpers\Models\Directory;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class AddCommand extends Command {
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setName('add')
            ->setDescription('Add a directory to your memory.')
            ->addArgument('name', InputArgument::REQUIRED, 'The name to remember this item, supports array dot.')
            ->addOption('path', 'p', InputOption::VALUE_OPTIONAL, 'The path to add, if left out the current directory will be assumed.', getcwd())
            ;
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $directory = new Directory();
        $directory->path = $input->getOption('path');
        $directory->name = $input->getArgument('name');
        $directory->save();
    }
}