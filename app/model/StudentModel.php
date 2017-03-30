<?php
namespace School\Model;

class StudentModel extends UserModel {
    public function __construct( $db ) {
        parent::__construct( $db );
    }

    /**
     * @param array $args
     * @return bool|mixed
     */
    public function createStudent( array $args ) {
        $user_id = parent::createUser( $args );

        if ( $user_id ) {
            $result = $this->db->query("INSERT INTO students (user_id, student_image) VALUES ($user_id, '{$args['image']}')");
            return $this->db->insert_id;
        }

        return false;
    }
}