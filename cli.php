<?php

require('WeirdController.php');

$url_params = ['start' => true, 'some_other_param' => 42];

$endpoints = [
  'start'
];

// The real controller should also take the HTTP method as a param.
$controller = new WeirdController($url_params, $endpoints);
// We should call isValid before doing this
$controller->execute();

?>