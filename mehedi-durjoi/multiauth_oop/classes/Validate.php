<?php
class Validate {
  private $_passed = false,
          $_errors = array(),
          $_db     = null;

  public function __construct() {
    $this->_db = DB::getInstance();
  }

  public function check($source, $items = array()) {
    foreach($items as $item => $rules) {
      $item = escape($item);
      $value = $source[$item];
      foreach($rules as $rule => $rule_value) {
        if($rule === 'required' && empty($value)) {
          $this->addError("{$item} is required");
        } else if(!empty($value)) {
          switch($rule) {
            case 'min':
              if(strlen($value) < $rule_value) {
                $this->addError("{$item} must be minimum of {$rule_value} characters");
              }
            break;
            case 'max':
              if(strlen($value) > $rule_value) {
                $this->addError("{$item} must be maximum of {$rule_value} characters");
              }
            break;
            case 'matches':
              if($value != $source[$rule_value]) {
                $this->addError("{$item} value must match {$rule_value}");
              }
            break;
            case 'unique':
              $check = $this->_db->get($rule_value, array($item, '=', $value));
              if($check->count()) {
                $this->addError("{$item} already exists");
              }
            break;
          }
        }
      }
    }

    if(!$this->errors()) {
      $this->_passed = true;
    }

    return $this;
  }

  private function addError($error) {
    $this->_errors[] = $error;
  }

  public function passed() {
    return $this->_passed;
  }

  public function errors() {
    return $this->_errors;
  }
}
