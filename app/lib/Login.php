<?php
namespace School\lib;

class Login {
    private static $user_id;

    private function __construct() {}

    /**
     * Check if the username and password match
     * If there is a match return the user_id, else return false
     * @param string $username
     * @param string $password
     * @return bool
     */
    public static function authenticate( string $username, string $password ) {
        $db = DB::getConnection();
        $md5password = md5( $password );
        $result = $db->query("SELECT user_id FROM users WHERE user_username = '$username' AND user_password = '$md5password'");

        if ( @$result->num_rows ) {
            $user = $result->fetch_assoc();
            return self::$user_id = $user['user_id'];
        }

        return false;
    }

    public static function login( string $username, string $password ) {
        $user_id = self::authenticate( $username, $password );

        if ( $user_id ) {
            @session_start();
            $_SESSION['login_user_id'] = $user_id;
            return true;
        }

        return false;
    }
}
