<?php
date_default_timezone_set("Europe/Zagreb");

// Get old and new data

$old_data = file_get_contents('log.txt');
$new_data = $_POST['data'];
$data = $old_data . "\n" . $new_data;

// Explode data, keep only last # minutes

$time_to_keep = "-30 days";

$lines = explode("\n", $data);

foreach ($lines as $line) {
	$temp = explode("\t", $line);
	if(strtotime($temp[0])>strtotime($time_to_keep)) {
		$array[] = implode("\t", $temp);
	};
}
file_put_contents('log.txt', implode("\n", $array));
?>
