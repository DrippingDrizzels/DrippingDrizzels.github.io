<?php

header("Access-Control-Allow-Origin: *");
require_once ('eventscontroller.php');

function executeapi() {
	$input;
	$posts = array ();
	if ($_SERVER ['REQUEST_METHOD'] === 'POST') {
		// this is post method
		$input = json_decode(file_get_contents('php://input'), true);//With input as JSON
		if($input ==null){
			$input = $_POST;
		}
	} else {
		// This is Get Method
		$input = $_GET;
	}
	$format = 'json';
	if (isset ( $input ['method'] )) {
		$method = strtolower ( $input ['method'] );
	} else {
		$method = "nomethod";
	}

	switch ($method) {
		case "getcurrentevents" :
			$posts = getCurrentEvents ();
			break;
		case "saveevent" :
			$posts = saveEvent ($input);
			break;
		default :
			$posts ["message"] = "Please check your information";
			$posts ["param"] = $input;
	}

	/* output in necessary format */
	header ( 'Content-type: application/json;charset=utf-8' );
	echo json_encode ( $posts );

}

function getCurrentEvents() {
    $g = new eventscontroller();
    $result=$g->getCurrentEvents();
    return $result;
}

function saveEvent($parameter) {
    $g = new eventscontroller();
		$event = $parameter ['event'];		
    $result=$g->saveEvent($event);
    return $result;
}


executeapi();
?>
