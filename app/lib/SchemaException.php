<?php
namespace School\lib;

class SchemaException extends \Exception {
    private $errors = [];

    public function __construct( array $errors ) {
        parent::__construct("Scheme error", 0, null);
        $this->errors = $errors;
    }

    public function getErrors() : array {
        return $this->errors;
    }
}