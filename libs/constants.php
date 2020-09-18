<?php
$dbHost="43.255.154.58";
$dbPort="3306";
$dbName="drippingdrizzels";
$dbUser="arwen";
$dbPassword="Arwen";
$dbEncoding="utf8";

define("DB_HOST",$dbHost);
define("DB_PORT",$dbPort);
define("DB_NAME",$dbName);
define("DB_USER",$dbUser);
define("DB_PASSWORD",$dbPassword);
define("DB_ENCODING",$dbEncoding);

$DS='/';

$projectFolder=dirname(dirname(__FILE__));

define("BASE_DIR_PATH",$projectFolder);

define("LOG_LEVEL","D");

define("LOGS_DIR_PATH",$projectFolder.$DS."logs".$DS);

define("INFO_LOG_FILE_NAME","(%UN%)info".date("Ymd").".log");
define("TESTING_LOG_FILE_NAME","(%UN%)testing".date("Ymd").".log");
define("DEBUG_LOG_FILE_NAME","(%UN%)debug".date("Ymd").".log");
define("ERROR_LOG_FILE_NAME","(%UN%)error".date("Ymd").".log");
define("PRODUCTION_LOG_FILE_NAME","(%UN%)production".date("Ymd").".log");

define("COOKIE_DIR_PATH",$projectFolder.$DS."cookie".$DS);
define("COOKIE_FILE_NAME","(%UN%)Cookie.txt");

//==Misc Constants==//
define("HTTP_ACCEPT_JSON","json");
define("HTTP_ACCEPT_XML","xml");

define("HTTP_METHOD_POST","post");
define("HTTP_METHOD_GET","get");
//==Misc Constants==//

//==Notification Constants==//
define("NOTIFICATION_TYPE_EVENT_INVITATION","evntinvt");
define("NOTIFICATION_TYPE_COMMENT_ADDED","cmntadd");
//==Notification Constants==//

//==Distance Constant==//
define("MAX_DISTANCE",1);
define("DISTANCE_KILOMETERS","K");
define("DISTANCE_NAUTICALMILES","N");
define("DISTANCE_MILES","M");
//==Distance Constant==//

//==Mode==//
define("MODE_NEW","new");
define("MODE_EDIT","edit");
define("MODE_DELETE","delete");
//==Mode==//

//==Invitee Response==//
define("RESPONSE_NO",0);
define("RESPONSE_YES",1);
define("RESPONSE_MAY_BE",2);
//==Invitee Response==//

?>
