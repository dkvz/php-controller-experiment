<?php

require('WeirdController.php');

$url_params = ['start' => true, 'some_other_param' => 42];
// The real controller should also take the HTTP method as a param.
$controller = new WeirdController($url_params);
// We should call isValid before doing this
$controller->execute();

?>