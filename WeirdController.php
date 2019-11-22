<?php

require('ControllerBase.php');

class WeirdController extends ControllerBase {

  public function start($params, $method, $baseValue) {
    echo "Called method start with value $baseValue.\n";
    echo "Got params:\n";
    print_r($params);
  }

}

?>