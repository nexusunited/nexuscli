<?php


namespace Nexus\Dumper\Communication\Command;


use DataProvider\DumperConfigDataProvider;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Xervice\Console\Command\AbstractCommand;

/**
 * @method \Nexus\Dumper\DumperFacade getFacade()
 */
class DumpSshCommand extends AbstractCommand
{
    protected function configure()
    {
        $this
            ->setName('dumper:dump:ssh')
            ->setDescription('Dump one volume to ssh')
            ->addArgument('volume', InputArgument::REQUIRED, 'The volume to dump')
            ->addArgument('path', InputArgument::OPTIONAL, 'The path inside the volume to dump', '/data')
            ->addArgument('version', InputArgument::OPTIONAL, 'The version for naming of your restore', 'master');
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
        $configDataProvider = new DumperConfigDataProvider();
        $configDataProvider->setVolume($input->getArgument('volume'));
        $configDataProvider->setPath($input->getArgument('path'));
        $configDataProvider->setVersion($input->getArgument('version'));
        $configDataProvider->setEngine('ssh');

        $this->getFacade()->dump($configDataProvider);
    }

}