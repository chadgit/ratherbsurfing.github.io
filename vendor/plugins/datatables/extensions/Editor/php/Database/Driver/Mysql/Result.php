<?php
/**
 * DataTables PHP libraries.
 *
 * PHP libraries for DataTables and DataTables Editor, utilising PHP 5.3+.
 *
 *  @author    SpryMedia
 *  @copyright 2012 SpryMedia ( https://sprymedia.co.uk )
 *  @license   https://editor.datatables.net/license DataTables Editor
 *  @link      https://editor.datatables.net
 */

namespace DataTables\Database;
if (!defined('DATATABLES')) exit();

use PDO;
use DataTables\Database\Result;


/**
 * MySQL driver for DataTables Database Result class
 *  @internal
 */
class DriverMysqlResult extends Result {
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

