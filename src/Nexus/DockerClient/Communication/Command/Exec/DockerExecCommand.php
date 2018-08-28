<?php


namespace Nexus\DockerClient\Communication\Command\Exec;


use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Xervice\Console\Business\Model\Command\AbstractCommand;

/**
 * @method \Nexus\DockerClient\Business\DockerClientFacade getFacade()
 */
class DockerExecCommand extends AbstractCommand
{
    protected function configure(): void
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