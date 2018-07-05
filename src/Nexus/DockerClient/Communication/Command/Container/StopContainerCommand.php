<?php


namespace Nexus\DockerClient\Communication\Command\Container;


use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Xervice\Console\Command\AbstractCommand;

/**
 * @method \Nexus\DockerClient\DockerClientFacade getFacade()
 */
class StopContainerCommand extends AbstractCommand
{
    protected function configure()
    {
        $this
            ->setName('docker:stop')
            ->setDescription('Stop a docker volume')
            ->addArgument('container', InputArgument::REQUIRED, 'Container name or id');
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
            'stop %s',
            $input->getArgument('container')
        );

        $response = $this->getFacade()->runDocker($command);

        if ($output->isVerbose()) {
            $output->writeln($response);
        }
    }


}