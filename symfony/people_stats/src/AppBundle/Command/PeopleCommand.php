<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use AppBundle\Controller\CustomerController;

/**
 * 
 * @author ctalpaert
 * 
 * For launch it in console: 
 * $ php bin/console customer:people
 *
 */

class PeopleCommand extends ContainerAwareCommand {
	protected function configure()
	{
		$this
			->setName('customer:people')
			->setDescription('People stats')
		;
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$em = $this->getContainer()->get('doctrine');
		$CustomerController = new CustomerController($em);
		foreach ($CustomerController->getMostPopularFirstnames() as $row) {
		   $output->writeln(str_pad(strtoupper($row['people']), 5).' '.$row['firstname']);
		};
		$output->writeln('[...]');
		$output->writeln('-------------------------');
		$output->writeln('Total: '.$CustomerController->getCount().' customers');
	}
}