<?php
namespace School\Model;
use School\lib\DB;

abstract class Model {
    protected $db;

    public function __construct() {
        $this->db = DB::getConnection();
    }
}