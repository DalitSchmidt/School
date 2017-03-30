<?php
namespace School\Controller;
use School\Model\CourseModel;
use School\lib\Schema;

class CourseController extends Controller {
    private $schemaName = 'course';

    public function __construct( CourseModel $model ) {
        parent::__construct( $model );
    }

    public function getCourses() {
        return $this->model->getCourses();
    }

    public function getCourse( int $course_id ) {
        return $this->model->getCourse( $course_id );
    }

    public function createCourse( array $args ) {
        Schema::check( $this->schemaName, $args );
        return $this->model->createCourse( $args );
    }

    /**
     * @param int $course_id
     * @return bool
     */
    public function deleteCourse( int $course_id ) : bool {
        return $this->model->deleteCourse( $course_id );
    }
}