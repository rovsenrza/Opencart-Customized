<?php
// APPLICATION
define('APPLICATION', 'Admin');

// HTTP
$default_http_server = 'http://localhost:8888/admin/';
$default_http_catalog = 'http://localhost:8888/';

if (isset($_SERVER['HTTP_HOST'])) {
	$scheme = 'http';

	if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') {
		$scheme = 'https';
	} elseif (!empty($_SERVER['REQUEST_SCHEME'])) {
		$scheme = $_SERVER['REQUEST_SCHEME'];
	} elseif (isset($_SERVER['SERVER_PORT']) && (string)$_SERVER['SERVER_PORT'] === '443') {
		$scheme = 'https';
	}

	$script = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '/admin/index.php');
	$admin_path = rtrim(dirname($script), '/');

	if ($admin_path === '' || $admin_path === '.') {
		$admin_path = '/admin';
	}

	$catalog_path = rtrim(dirname($admin_path), '/');
	$admin_base = $admin_path . '/';
	$catalog_base = $catalog_path ? $catalog_path . '/' : '/';

	$http_server = $scheme . '://' . $_SERVER['HTTP_HOST'] . $admin_base;
	$http_catalog = $scheme . '://' . $_SERVER['HTTP_HOST'] . $catalog_base;
} else {
	$http_server = $default_http_server;
	$http_catalog = $default_http_catalog;
}

define('HTTP_SERVER', $http_server);
define('HTTP_CATALOG', $http_catalog);

// DIR
define('DIR_OPENCART', rtrim(str_replace('\\', '/', dirname(__DIR__)), '/') . '/');
define('DIR_APPLICATION', DIR_OPENCART . 'admin/');
define('DIR_EXTENSION', DIR_OPENCART . 'extension/');
define('DIR_IMAGE', DIR_OPENCART . 'image/');
define('DIR_SYSTEM', DIR_OPENCART . 'system/');
define('DIR_CATALOG', DIR_OPENCART . 'catalog/');
define('DIR_STORAGE', DIR_SYSTEM . 'storage/');
define('DIR_LANGUAGE', DIR_APPLICATION . 'language/');
define('DIR_TEMPLATE', DIR_APPLICATION . 'view/template/');
define('DIR_CONFIG', DIR_SYSTEM . 'config/');
define('DIR_CACHE', DIR_STORAGE . 'cache/');
define('DIR_DOWNLOAD', DIR_STORAGE . 'download/');
define('DIR_LOGS', DIR_STORAGE . 'logs/');
define('DIR_SESSION', DIR_STORAGE . 'session/');
define('DIR_UPLOAD', DIR_STORAGE . 'upload/');

// DB
define('DB_DRIVER', 'mysqli');
define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_DATABASE', 'opencart');
define('DB_PORT', '8889');
define('DB_PREFIX', 'oc_');
define('DB_SSL_KEY', '');
define('DB_SSL_CERT', '');
define('DB_SSL_CA', '');

// OpenCart API
define('OPENCART_SERVER', 'https://www.opencart.com/');
