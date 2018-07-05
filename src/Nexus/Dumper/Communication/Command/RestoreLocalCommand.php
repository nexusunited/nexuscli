<?php


namespace Nexus\Dumper\Communication\Command;


use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Xervice\Console\Command\AbstractCommand;

/**
 * @method \Nexus\Dumper\DumperFacade getFacade()
 */
class RestoreLocalCommand extends AbstractCommand
{
    protected function configure()
    {
        $this
            ->setName('dumper:restore:local')
            ->setDescription('Restore one volume')
            ->addArgument('volume', InputArgument::REQUIRED, 'The volume to restore')
            ->addArgument('path', InputArgument::REQUIRED, 'The path inside the volume to restore')
            ->addArgument('version', InputArgument::REQUIRED, 'The version for naming of your restore')
            ->addArgument('datapath', InputArgument::OPTIONAL, 'The Datapath for naming of your restore', '/data');
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return int|null|void
     * @throws \Core\Locator\Dynamic\ServiceNotParseable
     * @throws \Xervice\Config\Exception\ConfigNotFound
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->getFacade()->restoreToLocal(
            $input->getArgument('volume'),
            $input->getArgument('path'),
            $input->getArgument('version'),
            $input->getArgument('datapath')
        );
    }

}