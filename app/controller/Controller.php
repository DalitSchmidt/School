<?php
namespace School\Controller;
use School\Model\Model;

abstract class Controller {
    protected $model;

    public function __construct( Model $model ) {
        $this->model = $model;
    }
}