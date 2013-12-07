<?php

define( 'NV_MAINFILE', 1 );

// Xac dinh thu muc goc cua site
define( 'NV_ROOTDIR', pathinfo( str_replace( DIRECTORY_SEPARATOR, '/', __file__ ), PATHINFO_DIRNAME ) );

// Ket noi voi  extends PDO
require NV_ROOTDIR . '/db.class.php';

// Ket noi voi  extends PDO
require NV_ROOTDIR . '/oci_config.php';

header( 'Content-Type: text/html; charset=utf-8' );

$db = new sql_db( $db_config );
if( $db->connect )
{
	$s = $db->prepare( "select * from nkv3_user" );
	$s->execute( );
	while( ($r = $s->fetch( )) != false )
	{
		print_r( $r ) . "<br>";
	}
}

?>