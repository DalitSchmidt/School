<?php
namespace School\Model;
require_once 'Model.php';

class UserModel extends Model {
    /**
     * UserModel constructor.
     * @param \mysqli $db
     */
    public function __construct( $db ) {
        parent::__construct( $db );
    }

    /**
     * @return mixed
     */
    public function getUsers() {
        $results = $this->db->query("SELECT * FROM users");
        return $results->fetch_array(ARRAY_A);
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
     * @throws \Exception
     */
    public function createUser( array $args ) {
        $query = "INSERT INTO users (user_username, user_email, user_password, user_firstname, user_lastname) VALUES ('{$args['username']}', '{$args['email']}', '{$args['password']}', '{$args['firstname']}', '{$args['lastname']}')";
        $success = $this->db->query( $query );

        if ( $this->db->error )
            throw new \Exception( $this->db->error );

        return ( $success ) ? $this->db->insert_id : false;
    }

    /**
     * @param int $user_id
     * @param array $args
     * @return mixed
     */
    public function updateUser( int $user_id, array $args ) {
        $updated = "UPDATE users SET user_username='".$args['username']."', user_email='".$args['email']."', user_password='".$args['password']."', user_firstname='".$args['firstname']."', user_lastname='".$args['lastname']."' WHERE user_id = $user_id";
        $this->db->query( $updated );
        return $this->db->affected_rows;
    }

    /**
     * @param int $user_id
     * @return bool
     */
    public function deleteUser( int $user_id ) : bool {
        $deleted = "DELETE FROM users WHERE user_id = $user_id";
        $this->db->query( $deleted );
        return (bool)$this->db->affected_rows;
    }
}