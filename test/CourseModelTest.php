<?php

use PHPUnit\Framework\TestCase;
use School\lib\DB;
use School\Model\CourseModel;

class CourseModelTest extends TestCase {
    protected $model;

    public function preDefine() {
        $this->model = new CourseModel( DB::getConnection() );
    }

    public function testGetCourseShouldReturnInt() {
        $id = $this->model->getCourse(1);
        $this->assertInstanceOf('int', $id);
    }

    public function testGetCourseShouldReturnNullWhenNotFound() {
        $id = $this->model->getCourse(0);
        $this->assertNull( $id );
    }

    public function testSearchingAUserInAPI() {
        $course = new \Courses\Course('Full Stack');
        $course->search('api');
        $this->assertType('array', $course->getDetails());
    }
}