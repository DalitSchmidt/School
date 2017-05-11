<?php
namespace School\Model;

require_once 'Model.php';

class CourseModel extends Model {
    /**
     * CourseModel constructor.
     * @param \mysqli $db
     */
    public function __construct( \mysqli $db ) {
        parent::__construct( $db );
    }

    /**
     * @return mixed
     */
    public function getCourses() {
        $results = $this->db->query("SELECT * FROM courses");
        return $results->fetch_all(true);
    }

    /**
     * @param $course_id
     * @return array
     */
    public function getCourse( $course_id ) {
        $result = $this->db->query("SELECT * FROM courses WHERE course_id = $course_id");
        return $result->fetch_assoc();
    }

    /**
     * @param array $args
     * @return bool|mixed
     */
    public function createCourse( array $args ) {
        $success = $this->db->query("INSERT INTO courses (course_name, course_description, course_image) VALUES ('{$args['name']}', '{$args['description']}', '{$args['image']}')");
        return ( $success ) ? $this->db->insert_id : false;
    }

    /**
     * @param int $course_id
     * @return bool
     */
    public function deleteCourse( int $course_id ) : bool {
        $this->db->query("DELETE FROM courses WHERE course_id = $course_id");
        return (bool)$this->db->affected_rows;
    }

    /**
     * @param int $course_id
     * @param array $args
     * @return int
     */
    public function updateCourse( int $course_id, array $args ) {
        $this->db->query("UPDATE courses SET course_name='".$args['name']."', course_description='".$args['description']."', course_image='".$args['image']."' WHERE course_id = $course_id");
        return $this->db->affected_rows;
    }
}