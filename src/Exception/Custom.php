<?php

namespace Virgoolio\Exception;

class Custom extends \Exception {

   const USERNAME_EMPTY = "Username could not be empty";

   public function __construct($message, $code = 0, Throwable $previous = null) {

      parent::__construct($message, $code, $previous);
   }

   public function __toString() {
      return __CLASS__ . ": [Virgool] - [{$this->code}]: {$this->message}\n";
   }
}
