<?php
include_once ('meekrodb.2.1.class.php');

DB::$host=DB_HOST;
//DB::$port=DB_PORT;
DB::$dbName=DB_NAME;
DB::$user=DB_USER;
DB::$password=DB_PASSWORD;
DB::$encoding=DB_ENCODING;

//Any SQL errors will throw MeekroDBException
DB::$error_handler=false;
DB::$throw_exception_on_error=true;

DB::$throw_exception_on_nonsql_error=true;

function select($sql)
{
	$result=NULL;
	
	try
	{
		$result=DB::query($sql);
	}
	catch(Exception $e)
	{
		throw new Exception($e->getMessage());
	}
	
	return $result;
}
?>
