<?php


namespace Nexus\DockerClient\Communication\Command\Build;


use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Xervice\Console\Command\AbstractCommand;

/**
 * @method \Nexus\DockerClient\DockerClientFacade getFacade()
 */
class DockerBuildCommand extends AbstractCommand
{
    protected function configure()
    {
        $this
            ->setName('docker:build')
            ->setDescription('Build a docker image')
            ->addArgument('directory', InputArgument::REQUIRED, 'Build directory')
            ->addArgument('image', InputArgument::REQUIRED, 'Image name');
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
            'build %s -t %s',
            $input->getArgument('directory'),
            $input->getArgument('image')
        );

        $response = $this->getFacade()->runDocker($command);

        if ($output->isVerbose()) {
            $output->writeln($response);
        }
    }


}