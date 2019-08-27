<?php

namespace Adele\Command\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Magento\Framework\Module\FullModuleList;
use Magento\Framework\Module\Manager;


class ShowActiveModules extends Command
{

    protected $fullModuleList;
    protected $moduleManager;

    /**
     * Order Status constructor
     *
     * @param FullModuleList $fullModuleList
     * @param Manager        $moduleManager
     * @param null           $name
     */

    public function __construct(
        FullModuleList $fullModuleList,
        Manager $moduleManager,
        $name = null
    ) {
        parent::__construct($name);
        $this->fullModuleList = $fullModuleList;
        $this->moduleManager  = $moduleManager;
    }

    /**
     * Command example: php bin/magento check-active
     *
     * @api
     */
    public function configure()
    {
        $this->setName('check-active')
            ->setDescription('Print list of active modules.');
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
        $allModules = $this->fullModuleList->getAll();
        $output->writeln('Active modules:');
        foreach ($allModules as $module) {
            if($this->moduleManager->isEnabled($module['name'])) {
                $output->writeln($module['name']);
            }
        }
    }
}
