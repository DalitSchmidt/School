<?php
namespace School\Model;

abstract class Model {
    protected $db;

    public function __construct( \mysqli $db ) {
        $this->db = $db;
    }
}