<?php
namespace School\Controller;
use School\Model\UserModel;
use School\lib\Schema;

class UserController extends Controller {
    private $schemaName = 'user';

    public function __construct() {
        $this->model = new UserModel();
    }

    public function getUsers() {
        return $this->model->getUsers();
    }

    public function getUser() {
        $this->model->getUser();
    }

    public function createUser( array $args ) {
        Schema::check($this->schemaName, $args);
        return $this->model->createUser( $args );
    }
}