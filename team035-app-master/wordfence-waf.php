<?php
// Before removing this file, please verify the PHP ini setting `auto_prepend_file` does not point to this.

if (file_exists('/home/u20s1035/dev_root/wp-content/plugins/wordfence/waf/bootstrap.php')) {
	define("WFWAF_LOG_PATH", '/home/u20s1035/dev_root/wp-content/wflogs/');
	include_once '/home/u20s1035/dev_root/wp-content/plugins/wordfence/waf/bootstrap.php';
}
?>