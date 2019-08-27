<?php

namespace Adele\Command\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;


class Greeting extends Command
{

    /**
     * Command example: php bin/magento greeting
     *
     * @api
     */
    public function configure()
    {
        $this->setName('greeting')
            ->setDescription('Just say hello.');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int|void|null
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Hello world!');
    }
}
