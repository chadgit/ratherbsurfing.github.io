<?php
/**
 * SQL Server driver for DataTables PHP libraries
 *
 *  @author    SpryMedia
 *  @copyright 2013 SpryMedia ( https://sprymedia.co.uk )
 *  @license   https://editor.datatables.net/license DataTables Editor
 *  @link      https://editor.datatables.net
 */

namespace DataTables\Database;
if (!defined('DATATABLES')) exit();

use PDO;
use DataTables\Database\Result;


/**
 * SQL Server driver for DataTables Database Result class
 *  @internal
 */
class DriverSqlserverResult extends Result {
	/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	 * Constructor
	 */

	function __construct( $dbh, $stmt )
	{
		$this->_dbh = $dbh;
		$this->_stmt = $stmt;
	}



	/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	 * Private properties
	 */

	private $_stmt;
	private $_dbh;



	/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	 * Public methods
	 */

	public function count ()
	{
		return count($this->fetchAll());
	}


	public function fetch ()
	{
		return $this->_stmt->fetch( \PDO::FETCH_ASSOC );
	}


	public function fetchAll ()
	{
		return $this->_stmt->fetchAll( \PDO::FETCH_ASSOC );
	}


	public function insertId ()
	{
		return $this->_dbh->lastInsertId();
	}
}

