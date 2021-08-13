<?php

/**
 * @Project NUKEVIET 4.x
 * @Author TAG (info@theanhgroup.com)
 * @Copyright (C) 2018 theanhgroup.com. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate  Mon, 11 Jul 2018 23:00:00 GMT
 */

if ( ! defined( 'NV_MAINFILE' ) ) die( 'Stop!!!' );

$module_version = array(  
	'name' => 'Slider', 
	'modfuncs' => 'main', 
	'submenu' => 'main', 
	'is_sysmod' => 0, 
	'virtual' => 1,  
	'version' => '4.3.04',  
	'date' => 'Mon, 12 Dec 2018 23:00:00 GMT',  
	'author' => 'TAG (info@theanhgroup.com)',  
	'uploads_dir' => array(
		$module_name,
		$module_name.'/images',
		$module_name.'/thumbs',
		$module_name.'/temp'
	),  
	'note' => '' 
);