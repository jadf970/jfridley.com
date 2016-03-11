<?php
ini_set( "display_errors", true );
date_default_timezone_set( "America/Chicago" );  // http://www.php.net/manual/en/timezones.php
define( "DB_DSN", "mysql:host=localhost;dbname=cms" );
define( "DB_USERNAME", "root" );
define( "DB_PASSWORD", "gottachangeit" );
define( "CLASS_PATH", "classes" );
define( "TEMPLATE_PATH", "templates" );
define( "HOMEPAGE_NUM_ARTICLES", 5 );
define( "ADMIN_USERNAME", "root" );
define( "ADMIN_PASSWORD", "password" );
define( "PAGE_TITLE", "You Are The One" );
// glob searching for all based on criteria, /*.php is a wildcard looking for anything php in the class path.
foreach (glob( CLASS_PATH . "/*.php") as $classname) {
  include $classname;
}
 
function handleException( $exception ) {
  echo "Sorry, a problem occurred. Please try later.";
  error_log( $exception->getMessage() );
}
 
set_exception_handler( 'handleException' );
?>
