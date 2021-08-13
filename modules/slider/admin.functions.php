<?php

/**
 * @Project NUKEVIET 4.x
 * @Author TAG (info@theanhgroup.com)
 * @Copyright (C) 2018 theanhgroup.com. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate  Mon, 11 Jul 2018 23:00:00 GMT
 */

if( ! defined( 'NV_ADMIN' ) or ! defined( 'NV_MAINFILE' ) or ! defined( 'NV_IS_MODADMIN' ) ) die( 'Stop!!!' );
 
$allow_func = array(
	'main',
	'photo',
	'group',
	'template' );

define( 'NV_IS_FILE_ADMIN', true );

define( 'TABLE_SLIDER_NAME', NV_PREFIXLANG . '_' . $module_data ); 

define( 'ACTION_METHOD', $nv_Request->get_string( 'action', 'get,post', '' ) ); 
 
$array_status = array( '0' => $lang_module['disabled'], '1' => $lang_module['enable'] );

$sql = 'SELECT * FROM ' . TABLE_SLIDER_NAME . '_group ORDER BY weight ASC';

$global_groups_slider = $nv_Cache->db( $sql, '', $module_name );


function get_output_json( $json )
{
	header( 'Content-Type: application/json' );
	include NV_ROOTDIR . '/includes/header.php';
	echo json_encode( $json );
	include NV_ROOTDIR . '/includes/footer.php';
}

