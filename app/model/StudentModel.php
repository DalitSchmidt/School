<?php
namespace School\Model;

require_once 'Model.php';
require_once 'UserModel.php';

class StudentModel extends UserModel {
    /**
     * StudentModel constructor.
     * @param \mysqli $db
     */
    public function __construct( $db ) {
        parent::__construct( $db );
    }

    /**
     * @return mixed
     */
    public function getStudents() {
        $results = $this->db->query("SELECT * FROM students");
        return $results->fetch_array(ARRAY_A);
    }

    /**
     * Return user details by the user id
     * @param int $user_id
     * @return array
     */
    public function getStudent( int $user_id ) {
        $result = $this->db->query("SELECT * FROM users WHERE user_id = $user_id");
        return $result->fetch_assoc();
    }

    /**
     * Creates new student
     * Return the id of the created student OR false on failure
     * @param array $args
     * @return bool|mixed
     */
    public function createStudent( array $args ) {
        $user_id = parent::createUser( $args );

        if ( $user_id ) {
            $query = "INSERT INTO students (`user_id`, `student_image`) VALUES ($user_id, '{$args['image']}')";
            $this->db->query( $query );
            return $this->db->insert_id;
        }

        return false;
    }

    /**
     * @param int $user_id
     * @param array $args
     * @return int
     */
    public function updateStudent( int $user_id, array $args ) {
        $updated = parent::updateUser( $user_id, $args );

        if ( $updated ) {
            $query = "UPDATE students SET student_image='{$args['image']}' WHERE user_id = $user_id";
            $this->db->query( $query );
            return $this->db->affected_rows;
        }
    }

    /**
     * @param int $user_id
     * @return bool
     */
    public function deleteStudent( int $user_id ) : bool {
        $deleted = parent::deleteUser( $user_id );

        if ( $deleted ) {
            $query = "DELETE FROM users WHERE user_id = $user_id";
            $this->db->query( $query );
            return (bool)$this->db->affected_rows;
        }
    }
}