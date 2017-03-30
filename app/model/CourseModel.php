<?php
namespace School\Model;

class CourseModel extends Model {
    public function __construct( \mysqli $db ) {
        parent::__construct( $db );
    }

    public function getCourses() {
        $results = $this->db->query("SELECT * FROM courses");
        return $results->fetch_all(true);
    }

    public function getCourse( $course_id ) {
        $result = $this->db->query("SELECT * FROM courses WHERE course_id = $course_id");
        return $result->fetch_assoc();
    }

    /**
     * @param array $args
     * @return int
     * @schema 'course.json'
     */
    public function createCourse( array $args ) : int {
        $this->db->query("INSERT INTO courses (course_name, course_description, course_image) VALUES ('{$args['name']}', '{$args['description']}', '{$args['image']}')");
        return $this->db->insert_id;
    }

    /**
     * @param int $course_id
     * @return bool
     */
    public function deleteCourse( int $course_id ) : bool {
        $this->db->query("DELETE FROM courses WHERE course_id = $course_id");
        return (bool)$this->db->affected_rows;
    }

    public function updateCourse( int $course_id, array $args ) {

    }
}