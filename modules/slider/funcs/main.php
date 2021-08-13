<?php

/**
 * @Project NUKEVIET 4.x
 * @Author TAG (info@theanhgroup.com)
 * @Copyright (C) 2018 theanhgroup.com. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate  Mon, 11 Jul 2018 23:00:00 GMT
 */

if( ! defined( 'NV_IS_MOD_PHOTO' ) ) die( 'Stop!!!' );

$page_title = $module_info['custom_title'];
$key_words = $module_info['keywords'];
 
 

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme( $contents );
include NV_ROOTDIR . '/includes/footer.php';
