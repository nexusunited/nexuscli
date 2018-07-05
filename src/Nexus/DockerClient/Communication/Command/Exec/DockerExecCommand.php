<?php


namespace Nexus\DockerClient\Communication\Command\Exec;


use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Xervice\Console\Command\AbstractCommand;

/**
 * @method \Nexus\DockerClient\DockerClientFacade getFacade()
 */
class DockerExecCommand extends AbstractCommand
{
    protected function configure()
    {
        $this
            ->setName('docker:exec')
            ->setDescription('Create a docker volume')
            ->addArgument('container', InputArgument::REQUIRED, 'Container name or id')
            ->addArgument('execcmd', InputArgument::REQUIRED, 'Exec command');
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
            'exec -i %s %s',
            $input->getArgument('container'),
            $input->getArgument('execcmd')
        );

        $response = $this->getFacade()->runDocker($command);

        if ($output->isVerbose()) {
            $output->writeln($response);
        }
    }


}