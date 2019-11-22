<?php

require('ControllerBase.php');

class WeirdController extends ControllerBase {

  public function start($params, $method) {
    echo "Called method start.\n";
    echo "Got params:\n";
    print_r($params);
  }

}

?>