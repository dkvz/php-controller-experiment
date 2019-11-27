<?php

abstract class ControllerBase {

  // Controller method to call:
  private $toCall = null;
  private $args = null;
  private $httpMethod = null;
  private $baseValue;

  public function __construct(
    array $urlParams, 
    array $endpoints,
    string $httpMethod = 'GET') {
      // Get the first element of $urlParams to
      // have a corresponding method:
      if (count($urlParams)) {
        // PHP 7.3 has a method to find the first 
        // array key. We're trying to stay more
        // compatible.
        // This whole thing works because Associative
        // arrays have a set order in PHP.
        $originalMethodName = array_keys($urlParams)[0];
        $methodName = preg_replace_callback(
          '/[\W_]+([^\W_])?/',
          function($matches) {
            if (count($matches) > 1) {
              return strtoupper($matches[1]);
            }
          },
          $originalMethodName
        );
        if (in_array($methodName, $endpoints) && method_exists($this, $methodName)) {
          $this->toCall = $methodName;
          $this->baseValue = $urlParams[$originalMethodName];
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
    $this->{$this->toCall}($this->args, $this->httpMethod, $this->baseValue);
  }

}

?>