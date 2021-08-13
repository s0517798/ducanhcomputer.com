<?php

/**
 * @Project NUKEVIET 4.x
 * @Author TAG (info@theanhgroup.com)
 * @Copyright (C) 2018 theanhgroup.com. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate  Mon, 11 Jul 2018 23:00:00 GMT
 */

if( ! defined( 'NV_IS_FILE_ADMIN' ) ) die( 'Stop!!!' );

$page_title = $lang_module['group'];
 
Header( 'Location: ' . NV_BASE_ADMINURL . 'index.php?' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=group' );
die();
 
include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme( $contents );
include NV_ROOTDIR . '/includes/footer.php';
