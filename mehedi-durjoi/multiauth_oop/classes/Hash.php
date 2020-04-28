<?php
class Hash {
  public static function make($string) {
    $options = array(
      'cost' => 10,
    );

    return password_hash($string, PASSWORD_BCRYPT, $options);
  }
}
