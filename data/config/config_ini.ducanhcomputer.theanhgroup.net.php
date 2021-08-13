<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2019 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Sun, 22 Sep 2019 06:05:41 GMT
 */

if (!defined('NV_MAINFILE'))
    die('Stop!!!');

$sys_info['disable_classes'] = [];
$sys_info['disable_functions'] = ['apache_note', 'apache_setenv', 'proc_get_status', 'exec', 'passthru', 'proc_nice', 'proc_open', 'proc_terminate', 'shell_exec', 'system', 'popen', 'ini_restore', 'syslog', 'define_syslog_variables', 'symlink', 'link', 'error_log', 'leak', 'dbmopen', 'openlog', 'closelog', 'popen', 'pclose', 'stream_socket_server', 'exec', 'system', 'passthru', 'shell_exec', 'escapeshellarg', 'escapeshellcmd', 'proc_close', 'ini_alter', 'dl', 'show_source', 'posix_geteuid', 'posix_getegid', 'posix_getgrgid', 'open_basedir', 'safe_mode_include_dir', 'pcntl_exec', 'pcntl_fork', 'proc_get_status', 'proc_nice', 'proc_terminate', 'virtual', 'openlog', 'symlink', 'proc_open', 'myshellexec', 'c99_buff_prepare', 'c99_sess_', 'put', 'symlink', 'symlinks', 'mail', 'posix_getpwuid'];
$sys_info['ini_set_support'] = true;
$sys_info['supports_rewrite'] = 'rewrite_mode_apache';
$sys_info['zlib_support'] = true;
$sys_info['mb_support'] = false;
$sys_info['iconv_support'] = true;
$sys_info['allowed_set_time_limit'] = true;
$sys_info['os'] = 'LINUX';
$sys_info['fileuploads_support'] = true;
$sys_info['curl_support'] = true;
$sys_info['ftp_support'] = true;
$sys_info['string_handler'] = 'iconv';
$sys_info['support_cache'] = [];
$sys_info['php_compress_methods'] = ['deflate' => 'gzdeflate', 'gzip' => 'gzencode', 'x-gzip' => 'gzencode', 'compress' => 'gzcompress', 'x-compress' => 'gzcompress'];
$sys_info['server_headers'] = ['server' => 'Apache','x-powered-by' => 'PHP/5.6.40','upgrade' => 'h2,h2c','content-length' => '0','content-type' => 'text/html; charset=UTF-8'];

ini_set('display_errors', '0');
ini_set('display_startup_errors', '0');
ini_set('log_errors', '0');
ini_set('session.cookie_httponly', '1');
ini_set('session.gc_maxlifetime', '3600');
ini_set('track_errors', '1');
ini_set('user_agent', 'NV4');

$iniSaveTime = 1569132341;
