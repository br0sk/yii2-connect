<?php
namespace br0sk\connect;

use yii\base\Component;

class Connect extends Component
{
	public $projectId = '';

	public $pushApiKey = null;

	private $_connect = null;


	public function init()
	{
		if (!$this->projectId) {
			throw new InvalidConfigException('ProjectId cannot be empty!');
		}
		if (!$this->pushApiKey) {
			throw new InvalidConfigException('PushAPIKey cannot be empty!');
		}
	}

	public function getConnect()
	{
		if ($this->_connect === null) {
			$this->_connect = \Connect\Connect::initialize($this->projectId, $this->pushApiKey);
		}
		return $this->_connect;
	}
	
	public function __call($method, $params)
	{
		$client = $this->getConnect();
		if (method_exists($client, $method))
			return call_user_func_array(array($client, $method), $params);
		return parent::__call($method, $params);
	}
}

