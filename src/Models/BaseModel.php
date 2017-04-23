<?php 

namespace App\Models;

abstract class BaseModel
{
	protected $table;
	protected $column;
	protected $db;
	protected $query;
    protected $check; //column you want to check

	public function __construct($db = null)
	{
		$this->db = $db;
		$this->query = null;
	}

	private function setDb()
	{
		global $container;

		$this->db = $container['db'];
	}

	private function getBuilder()
	{
		if ($this->db == null) {
			$this->setDb();
		}
		return $this->db->createQueryBuilder();
	}
}