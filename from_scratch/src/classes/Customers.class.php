<?php

class Customers
{

	private $_Db = null;

	public function __construct()
	{
		$this->_Db = new Db();
	}

	public function count()
	{
		$result = $this->_Db->query('SELECT COUNT(id) FROM customers');
		$row = $result->fetch_row();
		return $row[0];
	}

	public function mostPopularFirstnames()
	{
		$result = $this->_Db->query("SELECT firstname, COUNT(id) as people FROM customers GROUP BY firstname ORDER BY people DESC, firstname ASC LIMIT 10");
		$rows = array();
		while ($row = $result->fetch_array(MYSQLI_ASSOC))
			$rows[] = $row;
		return $rows;
	}

	public function truncate()
	{
		return $this->_Db->query('TRUNCATE customers');
	}

	public function insertThousandRandomName(array $firstnames)
	{
		$values = array();
		$n = rand(0, count($firstnames) - 1);
		for ($i = 0; $i < 1000; $i++)
		{
			if (42 == rand(0, 99))
			{
				$n = rand(0, count($firstnames) - 1);
			}
			$values[] = '("'.$firstnames[$n].'")';
		}
		$sql = 'INSERT INTO customers (firstname) VALUES '.implode(', ', $values);
		return $this->_Db->query($sql);
	}

}