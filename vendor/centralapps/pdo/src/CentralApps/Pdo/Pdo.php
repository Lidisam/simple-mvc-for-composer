<?php
namespace CentralApps\Pdo;

class Pdo extends \PDO
{
	protected $queryCount = 0;
	protected $queryLog = array();

	protected function addToLog($query)
	{
		$this->queryLog[] = $query;
	}

	public function incrementQueryCount()
	{
		$this->queryCount++;
	}

	public function addToQueryLog($query)
	{
		$this->queryLog[] = $query;
	}

	public function getQueryCount()
	{
		return $this->queryCount;
	}

	public function getQueryLog()
	{
		return $this->queryLog;
	}

	public function prepare($statement, $driver_options = array())
	{
		$driver_options[\PDO::ATTR_STATEMENT_CLASS] = array('\CentralApps\Pdo\PdoStatement');
		$statement = parent::prepare($statement, $driver_options);
		$statement->linkPdo($this);
		return $statement;
	}

	public function query($query)
	{
		$this->queryCount++;
		$this->queryLog[] = $query;
		return parent::query($query);
	}

	public function exec($statement)
	{
		$this->queryCount++;
		$this->queryLog[] = $query;
		return parent::exec($statement);
	}
}