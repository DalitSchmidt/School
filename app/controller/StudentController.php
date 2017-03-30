<?php
namespace School\Controller;
use School\lib\SchemaException;
use School\Model\Model;
use School\lib\Schema;

class StudentController extends UserController {
    private $schemaName = 'student';

    public function __construct( Model $model ) {
        parent::__construct( $model );
    }

    public function getStudents() {
        return $this->model->getUsers();
    }

    public function getStudent() {
        return $this->model->getUser();
    }

    /**
     * @param array $args
     * @return mixed
     */
    public function createStudent( array $args ) {
        Schema::check( $this->schemaName, $args );
        return $this->model->createStudent( $args );
    }
}