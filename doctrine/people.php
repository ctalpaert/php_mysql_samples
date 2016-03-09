<?php

require __DIR__.'/bootstrap.php';

$Customers = $entityManager->getRepository('Customer');
foreach ($Customers->mostPopularFirstnames() as $row) {
	echo str_pad(strtoupper($row['people']), 5).' '.$row['firstname']."\n";
};
echo "[...]\n";
echo "-------------------------\n";
echo 'Total: '.$Customers->count()." customers\n";