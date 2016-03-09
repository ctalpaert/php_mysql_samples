<?php

class Db
{
	
	private static $_mysqli = null;

	private function init()
	{
		self::$_mysqli = new mysqli('localhost', 'root', null, 'numeriforge');
		if (self::$_mysqli->connect_errno)
			throw new Exception('Connection failed');
	}

	public function getConnection()
	{
		if (null === self::$_mysqli)
			$this->init();
		return self::$_mysqli;
	}

	public function getError()
	{
		if (null === self::$_mysqli)
		{
			return;
		}
		return self::$_mysqli->error;
	}

	public function query($sql)
	{
		if (null === self::$_mysqli)
		{
			$this->init();
		}
		$result = self::$_mysqli->query($sql);
		if (self::$_mysqli->connect_errno)
		{
			throw new Exception(self::$_mysqli->connect_error."\n$sql");
		}
		return $result;
	}

	public function close()
	{
		if (null === self::$_mysqli)
		{
			return;
		}
		self::$_mysqli->close();
	}

}