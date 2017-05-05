<?php
namespace CentralApps\Pdo;

class PdoStatement extends \PDOStatement
{
	protected $pdo;
	protected $params = array();

	public function linkPdo($pdo)
	{
		$this->pdo = $pdo;
	}

	public function bindParam($parameter, &$variable, $data_type=\PDO::PARAM_STR, $length = 0, $driver_options=array())
	{
		if (\PDO::PARAM_STR == $data_type) {
			$this->params[$parameter] = "'" . $variable . "'";
		} else {
			$this->params[$parameter] = $variable;
		}

		parent::bindParam($parameter, $variable, $data_type, $length, $driver_options);
	}

	public function execute($input_parameters = null)
	{
		$this->pdo->incrementQueryCount();
		if (!is_null($input_parameters)) {
			foreach ($input_parameters as $key => $value) {
				$this->params[$key] = $value;
			}
		}
		$this->pdo->addToQueryLog($this->getReadableQueryString());
		return parent::execute($input_parameters);
	}

	public function getReadableQueryString()
	{
		return str_replace(array_keys($this->params), array_values($this->params), $this->queryString);
	}
}