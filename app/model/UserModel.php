<?php
namespace School\Model;

class UserModel extends Model {
    public function __construct( $db ) {
        parent::__construct( $db );
    }

    public function getUsers() {
        $result = $this->db->query("SELECT * FROM users");
        return $result->fetch_array(ARRAY_A);
    }

    /**
     * Return user details by the user id
     * @param int $user_id
     * @return array
     */
    public function getUser( int $user_id ) {
        $result = $this->db->query("SELECT * FROM users WHERE user_id = $user_id");
        return $result->fetch_assoc();
    }

    /**
     * @param string $email
     * @return array
     */
    public function getUserByEmail( string $email ) {
        $result = $this->db->query("SELECT * FROM users WHERE user_email = '$email'");
        return $result->fetch_assoc();
    }

    /**
     * Creates new user
     * Return the id of the created user OR false on failure
     * @param array $args
     * @return bool|mixed
     */
    public function createUser( array $args ) {
        $success = $this->db->query("INSERT INTO users (user_username, user_email, user_password, user_firstname, user_lastname) VALUES ('{$args['username']}', '{$args['email']}', '{$args['password']}', '{$args['firstname']}', '{$args['lastname']}')");
        return ( $success ) ? $this->db->insert_id : false;
    }
}