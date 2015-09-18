<?php
/**
  */

require_once 'messages.php';

//site specific configuration declartion
define( 'BASE_PATH', '');
define( 'DB_HOST', '' );
define( 'DB_USERNAME', '');
define( 'DB_PASSWORD', '');
define( 'DB_NAME', '');

//Google App Details
define('GOOGLE_APP_NAME', '');
define('GOOGLE_OAUTH_CLIENT_ID', '');
define('GOOGLE_OAUTH_CLIENT_SECRET', '');
define('GOOGLE_OAUTH_REDIRECT_URI', '');
define("GOOGLE_SITE_NAME", '');


function __autoload($class)
{
	$parts = explode('_', $class);
	$path = implode(DIRECTORY_SEPARATOR,$parts);
	require_once $path . '.php';
}
