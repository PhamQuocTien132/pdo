<?php

/**
 * @Project NUKEVIET 3.x
 * @Author VuThao (vuthao27@gmail.com)
 * @Copyright (C) 2013 VuThao. All rights reserved
 * @Createdate Thu, 12 Sep 2013 04:07:53 GMT
 */

/**
 * extends for PDO
 */
class sql_db extends pdo
{
	public $connect = 0;

	function __construct( $config )
	{
		$aray_type = array(
			'mysql',
			'pgsql',
			'mssql',
			'sybase',
			'dblib'
		);

		$AvailableDrivers = PDO::getAvailableDrivers( );

		if( in_array( $config['dbtype'], $AvailableDrivers ) AND in_array( $config['dbtype'], $aray_type ) )
		{
			$dsn = $config['dbtype'] . ':dbname=' . $config['dbname'] . ';host=' . $config['dbhost'];
		}
		elseif( $config['dbtype'] == 'oci' )
		{
			$dsn = 'oci:dbname=//' . $config['dbhost'] . ':' . $config['dbport'] . '/' . $config['dbname'];
		}
		elseif( $config['dbtype'] == 'sqlite' )
		{
			// db path filename
			$dsn = 'sqlite:' . $config['dbname'];
			$config['dbuname'] = '';
			$config['dbpass'] = '';
		}
		else
		{
			trigger_error( 'Unsupported type, ' . $config['dbtype'] );
			return false;
		}

		$driver_options = array(
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_EMULATE_PREPARES => false,
			PDO::ATTR_CASE => PDO::CASE_LOWER,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		);

		parent::__construct( $dsn . ';charset=utf8', $config['dbuname'], $config['dbpass'], $driver_options );
		try
		{
			$this->connect = 1;
		}
		catch( Exception $e )
		{
			trigger_error( $e->getMessage( ) );
		}
	}

}
?>