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
			$dsn = $config['dbtype'] . ':dbname=' . $config['dbname'] . ';host=' . $config['dbhost'] . ';charset=utf8';
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
		if( ! empty( $config['dbport'] ) )
		{
			$dsn .= 'port=' . $config['dbport'];
		}

		$driver_options = array( );
		parent::__construct( $dsn, $config['dbuname'], $config['dbpass'], $driver_options );
		try
		{
			//PDO::ERRMODE_SILENT: Khi gặp lỗi thì nó sẽ bỏ qua và tiếp tục chạy. Cái này tiện cho production.
			//PDO::ERRMODE_WARNING: Khi gặp lỗi nó sẽ xuất ra thông báo và tiếp tục chạy. Cái này tiện cho việc debug.
			//PDO::ERRMODE_EXCEPTION: Khi gặp lỗi nó sẽ đưa ra Exception và cho chúng ta xử lý
			$this->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

			# Disable emulation of prepared statements, use REAL prepared statements instead.
			$this->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );
			$this->connect = 1;
		}
		catch( Exception $e )
		{
			trigger_error( $e->getMessage( ) );
		}
	}

}
?>