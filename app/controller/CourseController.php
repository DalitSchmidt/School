<?php
namespace School\Controller;
use School\Model\CourseModel;
use School\lib\Schema;

class CourseController extends Controller {
    private $schemaName = 'course';

    public function __construct( CourseModel $model ) {
        parent::__construct( $model );
    }

    public function show() {
        return $this->model->getCourses();
    }

    public function fetch( int $course_id ) {
        return $this->model->getCourse( $course_id );
    }

    public function create( array $args ) {
        Schema::check( $this->schemaName, $args );
        return $this->model->createCourse( $args );
    }

    /**
     * @param int $course_id
     * @return bool
     */
    public function destroy( int $course_id ) : bool {
        return $this->model->deleteCourse( $course_id );
    }

    /**
     * @param int $course_id
     * @param array $args
     * @return mixed
     */
    public function update( int $course_id, array $args ) {
        return $this->model->updateCourse( $course_id, $args );
    }
}