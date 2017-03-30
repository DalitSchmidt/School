<?php
namespace School\Controller;
use School\Model\Model;
use School\lib\Schema;

class UserController extends Controller {
    private $schemaName = 'user';

    public function __construct( Model $model ) {
        parent::__construct( $model );
    }

    public function getUsers() {
        return $this->model->getUsers();
    }

    public function getUser() {
        return $this->model->getUser();
    }

    public function createUser( array $args ) {
        Schema::check( $this->schemaName, $args );
        return $this->model->createUser( $args );
    }
}