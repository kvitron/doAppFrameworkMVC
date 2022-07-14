<?php

/**
 * Модель по умолчанию
 */

use database\Database;

class Model
{
	protected $db_connection = null;

	public function __construct()
	{
		$this->db_connection = new Database();
		$this->db_connection = $this->db_connection->connection;
	}
}