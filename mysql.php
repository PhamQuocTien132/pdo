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

	$db->query( "
CREATE TABLE IF NOT EXISTS `nv3_test` (
  `lang` char(3) NOT NULL DEFAULT 'sys',
  `module` varchar(25) NOT NULL DEFAULT 'global',
  `config_name` varchar(30) NOT NULL DEFAULT '',
  `config_value` mediumtext NOT NULL,
  UNIQUE KEY `lang` (`lang`,`module`,`config_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8" );

	$result = $db->query( "INSERT INTO `nv3_test` (`lang`, `module`, `config_name`, `config_value`) VALUES
('sys', 'site', 'closed_site', '0'),
('sys', 'site', 'admin_theme', 'admin_default'),
('sys', 'site', 'date_pattern', 'l, d/m/Y'),
('sys', 'site', 'time_pattern', 'H:i'),
('sys', 'site', 'online_upd', '1'),
('sys', 'site', 'statistic', '1'),
('sys', 'site', 'mailer_mode', ''),
('sys', 'site', 'smtp_host', 'smtp.gmail.com'),
('sys', 'site', 'smtp_ssl', '1'),
('sys', 'site', 'smtp_port', '465'),
('sys', 'site', 'smtp_username', 'user@gmail.com'),
('sys', 'site', 'smtp_password', ''),
('sys', 'site', 'googleAnalyticsID', ''),
('sys', 'site', 'googleAnalyticsSetDomainName', '0'),
('sys', 'site', 'searchEngineUniqueID', ''),
('sys', 'global', 'site_keywords', 'NukeViet, portal, mysql, php'),
('sys', 'global', 'site_phone', ''),
('sys', 'global', 'site_lang', 'vi'),
('sys', 'global', 'block_admin_ip', '0'),
('sys', 'global', 'admfirewall', '0'),
('sys', 'global', 'dump_autobackup', '1'),
('sys', 'global', 'dump_backup_ext', 'gz'),
('sys', 'global', 'dump_backup_day', '30'),
('sys', 'global', 'gfx_chk', '3'),
('sys', 'global', 'file_allowed_ext', 'adobe,archives,audio,documents,flash,images,real,video'),
('sys', 'global', 'forbid_extensions', 'php,php3,php4,php5,phtml,inc'),
('sys', 'global', 'forbid_mimes', ''),
('sys', 'global', 'nv_max_size', '2097152'),
('sys', 'global', 'upload_checking_mode', 'mild'),
('sys', 'global', 'str_referer_blocker', '0'),
('sys', 'global', 'allowuserreg', '1'),
('sys', 'global', 'allowuserlogin', '1'),
('sys', 'global', 'allowloginchange', '0'),
('sys', 'global', 'allowquestion', '1'),
('sys', 'global', 'allowuserpublic', '0'),
('sys', 'global', 'useactivate', '2'),
('sys', 'global', 'allowmailchange', '1'),
('sys', 'global', 'allow_sitelangs', 'vi'),
('sys', 'global', 'allow_adminlangs', 'cs,en,fr,ja,tr,vi'),
('sys', 'global', 'read_type', '0'),
('sys', 'global', 'rewrite_optional', '1'),
('sys', 'global', 'rewrite_endurl', '/'),
('sys', 'global', 'rewrite_exturl', '.html'),
('sys', 'global', 'rewrite_op_mod', 'news'),
('sys', 'global', 'autocheckupdate', '0'),
('sys', 'global', 'autoupdatetime', '24'),
('sys', 'global', 'gzip_method', '1'),
('sys', 'global', 'is_user_forum', '0'),
('sys', 'global', 'openid_mode', '1'),
('sys', 'global', 'authors_detail_main', '0'),
('sys', 'global', 'spadmin_add_admin', '1'),
('sys', 'global', 'openid_servers', 'yahoo,google,myopenid'),
('sys', 'global', 'optActive', '0'),
('sys', 'global', 'timestamp', '28'),
('sys', 'global', 'mudim_displaymode', '1'),
('sys', 'global', 'mudim_method', '4'),
('sys', 'global', 'mudim_showpanel', '1'),
('sys', 'global', 'mudim_active', '1'),
('sys', 'global', 'captcha_type', '0'),
('sys', 'global', 'version', '3.5.00'),
('sys', 'global', 'whoviewuser', '2'),
('sys', 'global', 'facebook_client_id', ''),
('sys', 'global', 'facebook_client_secret', ''),
('sys', 'global', 'cookie_httponly', '1'),
('sys', 'global', 'admin_check_pass_time', '1800'),
('sys', 'global', 'adminrelogin_max', '3'),
('sys', 'global', 'cookie_secure', '0'),
('sys', 'global', 'nv_unick_type', '4'),
('sys', 'global', 'nv_upass_type', '0'),
('sys', 'global', 'is_flood_blocker', '0'),
('sys', 'global', 'max_requests_60', '40'),
('sys', 'global', 'max_requests_300', '150'),
('sys', 'global', 'nv_display_errors_list', '1'),
('sys', 'global', 'display_errors_list', '1'),
('sys', 'global', 'nv_auto_resize', '1'),
('sys', 'global', 'dump_interval', '1'),
('sys', 'define', 'nv_unickmin', '4'),
('sys', 'define', 'nv_unickmax', '20'),
('sys', 'define', 'nv_upassmin', '5'),
('sys', 'define', 'nv_upassmax', '20'),
('sys', 'define', 'nv_gfx_num', '6'),
('sys', 'define', 'nv_gfx_width', '120'),
('sys', 'define', 'nv_gfx_height', '25'),
('sys', 'define', 'nv_max_width', '1500'),
('sys', 'define', 'nv_max_height', '1500'),
('sys', 'define', 'cdn_url', ''),
('sys', 'define', 'nv_live_cookie_time', '31104000'),
('sys', 'define', 'nv_live_session_time', '0'),
('sys', 'define', 'nv_anti_iframe', '0'),
('sys', 'define', 'nv_allowed_html_tags', 'embed, object, param, a, b, blockquote, br, caption, col, colgroup, div, em, h1, h2, h3, h4, h5, h6, hr, i, img, li, p, span, strong, sub, sup, table, tbody, td, th, tr, u, ul, iframe'),
('sys', 'define', 'dir_forum', ''),
('vi', 'global', 'site_name', 'NukeViet'),
('vi', 'global', 'site_logo', 'images/logo.png'),
('vi', 'global', 'site_description', 'NukeViet CMS 3.x Developed by VINADES.,JSC'),
('vi', 'global', 'site_keywords', ''),
('vi', 'global', 'site_theme', 'modern'),
('vi', 'global', 'site_home_module', 'news'),
('vi', 'global', 'switch_mobi_des', '1'),
('vi', 'global', 'upload_logo', 'images/logo.png'),
('vi', 'global', 'autologosize1', '50'),
('vi', 'global', 'autologosize2', '40'),
('vi', 'global', 'autologosize3', '30'),
('vi', 'global', 'autologomod', ''),
('vi', 'global', 'metaTagsOgp', '1'),
('vi', 'global', 'disable_site_content', 'Vì lý do kỹ thuật website tạm ngưng hoạt động. Thành thật xin lỗi các bạn vì sự bất tiện này!'),
('vi', 'news', 'indexfile', 'viewcat_page_new'),
('vi', 'news', 'per_page', '20'),
('vi', 'news', 'st_links', '10'),
('vi', 'news', 'auto_postcomm', '1'),
('vi', 'news', 'homewidth', '100'),
('vi', 'news', 'homeheight', '150'),
('vi', 'news', 'blockwidth', '52'),
('vi', 'news', 'blockheight', '75'),
('vi', 'news', 'imagefull', '460'),
('vi', 'news', 'setcomm', '2'),
('vi', 'news', 'copyright', 'Chú ý&#x3A; Việc đăng lại bài viết trên ở website hoặc các phương tiện truyền thông khác mà không ghi rõ nguồn http&#x3A;&#x002F;&#x002F;nukeviet.vn là vi phạm bản quyền'),
('vi', 'news', 'showhometext', '1'),
('vi', 'news', 'activecomm', '2'),
('vi', 'news', 'emailcomm', '1'),
('vi', 'news', 'timecheckstatus', '0'),
('vi', 'news', 'config_source', '0'),
('vi', 'news', 'show_no_image', '1'),
('sys', 'site', 'site_email', 'thao@vinades.vn'),
('sys', 'site', 'error_send_email', 'thao@vinades.vn'),
('sys', 'global', 'my_domains', 'nukeviet.net,192.168.56.1'),
('sys', 'global', 'cookie_prefix', 'nv3c_Pv5kh'),
('sys', 'global', 'session_prefix', 'nv3s_E633r5'),
('sys', 'global', 'site_timezone', 'byCountry'),
('sys', 'site', 'statistics_timezone', 'Asia/Bangkok'),
('sys', 'global', 'proxy_blocker', '0'),
('sys', 'global', 'lang_multi', '0'),
('sys', 'global', 'lang_geo', '0'),
('sys', 'global', 'ftp_server', 'localhost'),
('sys', 'global', 'ftp_port', '21'),
('sys', 'global', 'ftp_user_name', ''),
('sys', 'global', 'ftp_user_pass', 'By276PqZrHBdYViYLXfawwctu-j6maxwXWFYmC132sM,'),
('sys', 'global', 'ftp_path', '/'),
('sys', 'global', 'ftp_check_login', '0'),http://localhost/phpmyadmin/index.php
('sys', 'global', 'cdn_url', ''),
('vi', 'news', 'allowed_rating_point', '6'),
('vi', 'news', 'module_logo', 'images/logo.png'),
('vi', 'news', 'structure_upload', 'Ym'),
('sys', 'site', 'metaTagsOgp', '1'),
('sys', 'site', 'googleAnalyticsMethod', 'classic'),
('vi', 'news', 'facebookappid', '1419186468293063'),
('vi', 'news', 'socialbutton', '0')" );

	$result = $db->query( 'select * from nv3_test' );
	print_r( $result );

	foreach( $result as $row )// lặp qua từng dòng
	{
		printf( 'module: %s<br />config_name: %s <p />', $row['module'], $row['config_name'] );
	}

	$sth = $db->prepare( "select `module`, `config_name` nv3_test WHERE catid>1" );
	$sth->execute( );

	/* Fetch all of the remaining rows in the result set */
	print("Fetch all of the remaining rows in the result set:\n");
	$result = $sth->fetchAll( );
	print_r( $result );

}
else
{
	die( 'ERRROR' );

}
die( 'End' );
?>