<?php

/**
 * @Project NUKEVIET 3.x
 * @Author VuThao (vuthao27@gmail.com)
 * @Copyright (C) 2013 VuThao. All rights reserved
 * @Createdate Thu, 12 Sep 2013 04:07:53 GMT
 */

define( 'NV_MAINFILE', 1 );

// Xac dinh thu muc goc cua site
define( 'NV_ROOTDIR', pathinfo( str_replace( DIRECTORY_SEPARATOR, '/', __file__ ), PATHINFO_DIRNAME ) );

// Ket noi voi  extends PDO
require NV_ROOTDIR . '/db.class.php';

// Ket noi voi  extends PDO
require NV_ROOTDIR . '/mysql_config.php';

header( 'Content-Type: text/html; charset=utf-8' );

$db = new sql_db( $db_config );
if( $db->connect )
{
	try
	{
		//exec: Sử dụng sửa, xóa các biến chắn chắn không gây ra sql Injection, sẽ trả về số dòng thực hiện
		$count = $db->exec( "DELETE FROM nv3_config WHERE module = 'khongco'" );
		print("Deleted $count rows<br>");

		echo '--------------<br>';
		//query: Sử dụng trong các câu truy vấn không có  biến truyền vào, hoặc các biến chắn chắn không gây ra sql Injection
		$result = $db->query( 'select SQL_CALC_FOUND_ROWS * from nv3_config LIMIT 0, 3' );

		$rs1 = $db->query( 'SELECT FOUND_ROWS()' );
		$all_page = $rs1->fetchColumn( );

		print("all_page $all_page rows<br>");

		foreach( $result as $row )// lặp qua từng dòng
		{
			printf( 'module: %s<br />config_name: %s <p />', $row['module'], $row['config_name'] );
		}

		echo '-------news-------<br>';
		$result = $db->query( "select * from nv3_config WHERE module='news' LIMIT 0, 4", PDO::FETCH_ASSOC );
		//fetch từng dòng kết quả
		while( $row = $result->fetch( ) )
		{
			printf( 'module: %s<br />config_name: %s <p />', $row['module'], $row['config_name'] );
			print_r( $row );
		}
		$result = null;

		echo '-------fetchAll-------<br>';
		$result = $db->query( 'select * from nv3_config LIMIT 0, 4' );
		//fetchAll: sẽ trả về mảng giá trị
		$array = $result->fetchAll( PDO::FETCH_ASSOC );
		var_export( $array );

		echo '<br>------bindParam--------<br>';
		$module = 'users';

		$sth = $db->prepare( "select * from nv3_config WHERE module=:module LIMIT 0, 4" );
		$sth->bindValue( ':module', $module );
		$sth->execute( );
		$array = $sth->fetchAll( PDO::FETCH_ASSOC );
		var_export( $array );

		echo '<br>------INSERT--------<br>';

		$config_name = 'users2';
		$config_value = 'dsadsadsadsadsa';
		try
		{
			$sth = $db->prepare( "INSERT INTO `nv3_config2` (`lang`, `module`, `config_name`, `config_value`) VALUES ('sys', 'global', :config_name, :config_value);" );
			$sth->bindValue( ':config_name', $config_name, PDO::PARAM_STR, 30 );
			$sth->bindValue( ':config_value', $config_value );
			$sth->execute( );
			$id = $db->lastInsertId( );
		}
		catch( PDOException $e )
		{
			trigger_error( $e->getMessage( ) );
			$id = 0;
		}
		print("lastInsertId: $id<br>");

		$config_name = 'users2';
		$del = $db->prepare( 'DELETE FROM nv3_config2 WHERE config_name=:config_name' );
		$del->bindValue( ':config_name', $config_name );
		$del->execute( );

		/* Return number of rows that were deleted */
		print("Return number of rows that were deleted:\n");
		$count = $del->rowCount( );
		print("Deleted $count rows.\n");

	}
	catch( PDOException $e )
	{
		trigger_error( $e->getMessage( ) );
	}
}
else
{
	die( 'ERRROR' );

}
die( 'End' );
?>