<?php

function validateInput ($title, $content, $published_at){

$errors = [];
if ($_SERVER['REQUEST_METHOD'] == "POST"){

	if ($_POST['title'] == ''){

        $errors[] = "Titile is required";
	}
	
if ($_POST['content'] == ''){
	$errors[] = "Content is required";
}

$date_time = date_create_from_format('Y-m-d H:i:s', $_POST['published_at']);
	
if ($date_time === false){
	$errors[] = "Wrong time";
}
$test_time = date_get_last_errors($date_time);
	
	
if ($test_time['warning_count'] > 0){
	$errors[] = "Wrong time";	
   }	
  }
	return $errors;
}
?>


