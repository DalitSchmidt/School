<?php
namespace School\lib;

class DB {
    private static $_instance = null;

    private function __construct(){}

    /**
     * @return \mysqli|null
     */
    public static function getConnection() {
        if ( self::$_instance == null ) {
            self::$_instance = @new \mysqli("localhost", "root", "", "school");

            if ( self::$_instance->connect_errno )
                throw new \mysqli_sql_exception("Error establishing DB connection: " . self::$_instance->connect_error);
        }

        return self::$_instance;
    }
}