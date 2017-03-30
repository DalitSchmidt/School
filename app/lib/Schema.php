<?php
namespace School\lib;
use JsonSchema\Validator;

class Schema {
    // Private constructor is blocking the option to make new instances from this class
    private function __construct(){}

    // const is the same as writing "private static" BUT it is not POSSIBLE to change the value after putting
    const SCHEMA_DIR = 'schemas';

    /**
     * Get schema takes the name of the needed schema to check
     * It searches the .json file inside the SCHEMA_DIR and if it finds it, it will
     * get the file contents, encode the json and return the array (of the parsed json)
     *
     * @param string $schemaName
     * @return mixed|string
     * @throws \Exception
     */
    private static function getSchema( string $schemaName ) {
        // For instance if the $schemaName is "user", it will search for "user.json" inside the schema dir
        $schema = @file_get_contents(dirname(__FILE__) . '/' . self::SCHEMA_DIR . '/' . $schemaName . '.json');

        // If it won't find any file, it will throw an exception telling <SCHEMA>.json not found
        if ( !$schema )
            throw new \Exception("File " . dirname(__FILE__) . '/' . self::SCHEMA_DIR . '/' . $schemaName . '.json'." not found");

        // If we reached here it means the file has been found and we parse the JSON to be array
        $schema = json_decode( $schema, true );

        // Check if the content inside the json file is indeed a JSON format
        // json_decode WILL RETURN NULL if the json we send to the function is NOT A VALID FORMAT
        if ( is_null( $schema ) )
            throw new \Exception("Scheme is not in a valid JSON format");

        // Return the array of the schema
        return $schema;
    }

    /**
     * The method takes two params, the first is the schema name and the second is the data array
     * The schema name is being sent to the method getSchema which brings the array of the schema itself
     * @param string $schemaName
     * @param array $data
     * @return bool
     * @throws SchemaException
     */
    public static function check( string $schemaName, array $data ) {
        // Refer to the method getSchema in order to get back the array of the schema
        // The array of the schema dictates the rules that should be fulfilled in order to pass the array
        // The schema array is the way to describe "rules" that the array of the data should follow
        $schema = self::getSchema( $schemaName );

        // Create new validator instance
        $validator = new Validator();

        // Check the schema array AGAINST the data array
        // In this part WE ARE ACTUALLY MAKING THE MAIN CHECKING of the array to follow the rules we want
        $validator->check( $data, $schema );

        // Check if it is valid schema
        if ( !$validator->isValid() ) {
            // If not, init empty array to hold the errors
            $errors = [];

            // Loop through the errors
            foreach ( $validator->getErrors() as $error )
                $errors[ $error['property'] ] = $error['message'];

            // Pass the array for the SchemaException (custom class) to report the errors
            throw new SchemaException( $errors );
        }

        // If we reached here it means we passed the test of the schema checking and we're returning
        // true, which means the DATA ARRAY IS VALID
        return true;
    }
}