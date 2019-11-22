<?php

class ControllerBase {

  // Controller method to call:
  private $toCall = null;
  private $args = null;
  private $httpMethod = null;

  public function __construct(array $urlParams, string $httpMethod = 'GET') {
    // Get the first element of $urlParams to
    // have a corresponding method:
    if (count($urlParams)) {
      // PHP 7.3 has a method to find the first 
      // array key. We're trying to stay more
      // compatible.
      // This whole thing works because Associative
      // arrays have a set order in PHP.
      $methodName = array_keys($urlParams)[0];
      if (method_exists($this, $methodName)) {
        $this->toCall = $methodName;
        // Will be an empty array if $urlParams doesn't have
        // more elements:
        $this->args = array_slice($urlParams, 1); 
        $this->httpMethod = $httpMethod;
      }
    }
  }

  public function isValid() {
    return $this->toCall !== null;
  }

  public function execute() {
    $this->{$this->toCall}($this->args, $this->httpMethod);
  }

}

?>