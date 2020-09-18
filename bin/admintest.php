<?php
require_once ('eventscontroller.php');

function getCurrentEvents()
{
	$g = new eventscontroller();
	$result=$g->getCurrentEvents();
	return $result;
}
getCurrentEvents();

?>