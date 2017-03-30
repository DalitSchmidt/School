<?php
namespace School\lib;

/**
 * This is a singleton kind of class which follow a pre-defined rules
 * Class DB
 * @package School\lib
 */
class DB {
    // Set empty instance var
    private static $_instance = null;

    // Disable the option to create objects from the class
    private function __construct(){}

    /**
     * Get the connection
     * @return \mysqli|null
     */
    public static function getConnection() {
        // First, check if the $_instance is empty
        if ( self::$_instance == null ) {
            // If it is, create new object of mysqli and put inside out $_instance var
            self::$_instance = @new \mysqli("localhost", "root", "", "school");

            // If there is a connection error we should throw an exception of the type of mysqli
            if ( self::$_instance->connect_errno )
                throw new \mysqli_sql_exception("Error establishing DB connection: " . self::$_instance->connect_error);
        }

        // Anyway return the $_instance
        return self::$_instance;
    }
}