<?php


namespace Nexus\DockerClient\Communication\Command\Copy;


use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Xervice\Console\Command\AbstractCommand;

/**
 * @method \Nexus\DockerClient\DockerClientFacade getFacade()
 */
class DockerCpCommand extends AbstractCommand
{
    protected function configure()
    {
        $this
            ->setName('docker:cp')
            ->setDescription('Create a docker volume')
            ->addArgument('source', InputArgument::REQUIRED, 'Copy from')
            ->addArgument('target', InputArgument::REQUIRED, 'Copy to');
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return int|null|void
     * @throws \Core\Locator\Dynamic\ServiceNotParseable
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $command = sprintf(
            'cp %s %s',
            $input->getArgument('source'),
            $input->getArgument('target')
        );

        $response = $this->getFacade()->runDocker($command);

        if ($output->isVerbose()) {
            $output->writeln($response);
        }
    }


}