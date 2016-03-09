#!/usr/bin/php
<?php

require __DIR__.'/src/autoload.php';

$firstnames = json_decode(file_get_contents(__DIR__.'/../firstnames_list.json'));
$Customers = new Customers();
$Customers->truncate();
echo "       0 firstname\n";
for ($i = 0; $i < 10000; $i++)
{
	$Customers->insertThousandRandomName($firstnames);
	if ($i > 0 &&0 == $i % 100)
	{
		echo str_pad($i, 5, ' ', STR_PAD_LEFT)."000 firstnames\n";
	}
}
echo "10000000 firstnames\n";