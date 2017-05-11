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

    public function show() {
        return $this->model->getStudents();
    }

    public function fetch( int $student_id ) {
        return $this->model->getStudent( $student_id );
    }

    /**
     * @param array $args
     * @return mixed
     */
    public function create( array $args ) {
        Schema::check( $this->schemaName, $args );
        return $this->model->createStudent( $args );
    }

    /**
     * @param int $student_id
     * @return bool
     */
    public function destroy( int $student_id ) : bool {
        return $this->model->deleteStudent( $student_id );
    }

    /**
     * @param int $student_id
     * @param array $args
     * @return mixed
     */
    public function update( int $student_id, array $args ) {
        return $this->model->updateStudent( $student_id, $args );
    }
}