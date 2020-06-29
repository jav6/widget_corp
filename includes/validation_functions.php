<?php 
$errors = array();

function fieldname_as_text($fieldname){
	$fieldname = str_replace("_", " ", $fieldname);
	$fieldname = ucfirst($fieldname);
	return $fieldname;
}
//2.5
function has_presence($value){
	return isset($value) && $value !== "";
}
//2
function validation_presence($require_fields){
	global $errors;
	foreach ($require_fields as $field) {
		$value = trim($_POST[$field]);
		if (!has_presence($value)) {
			$errors[$field] = fieldname_as_text($field) . " Can't be blank";
		}
	}
}
//1.5 - and 3
function has_max_length($value, $max){
	return strlen($value) <= $max;
}
//1
function validate_max_lengths($field_with_max_lenght){
	global $errors;
	// Expects an assoc, array
	foreach ($field_with_max_lenght as $field => $max) {
		$value = trim($_POST[$field]);
		if (!has_max_length($value, $max)) {
			$errors[$field] = fieldname_as_text($field) . " is toolong";
		}
	}
}

// * inclusion in a set
function has_inclusion_in($value, $set){
	return in_array($value, $set);
}

 ?>
