<?php

/**
 * @Project NUKEVIET 3.x
 * @Author VuThao (vuthao27@gmail.com)
 * @Copyright (C) 2013 VuThao. All rights reserved
 * @Createdate Thu, 12 Sep 2013 04:07:53 GMT
 */

error_reporting( 0 );

// Xac dinh thu muc goc cua site
define( 'NV_ROOTDIR', pathinfo( str_replace( DIRECTORY_SEPARATOR, '/', __file__ ), PATHINFO_DIRNAME ) );

// Ket noi voi  extends PDO
require NV_ROOTDIR . '/db.class.php';

header( 'Content-Type: text/html; charset=utf-8' );

$db_config = array( );
$db_config['dbhost'] = '127.0.0.1';
$db_config['dbport'] = '';
$db_config['dbname'] = 'nukeviet';
$db_config['dbuname'] = 'root';
$db_config['dbpass'] = 'HqN7Oj6lfi';
$db_config['dbtype'] = 'mysql';
$db = new sql_db( $db_config );
if( $db->connect )
{
	$result = $db->query( 'select catid, title from nv3_vi_news_cat WHERE catid>1' );
	foreach( $result as $row )// lặp qua từng dòng
	{
		printf( 'catid: %s<br />title: %s <p />', $row['catid'], $row['title'] );
	}
}
else
{
	die( 'ERRROR' );

}
die( 'End' );
?>