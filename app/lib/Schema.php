<?php
namespace School\lib;
use JsonSchema\Validator;

class Schema {
    private function __construct(){}

    private static $SCHEMA_DIR = 'schemas';

    private static function getSchema( string $schemaName ) {
        $schema = @file_get_contents(dirname(__FILE__) . '/' . self::$SCHEMA_DIR . '/' . $schemaName . '.json');

        if ( !$schema )
            throw new \Exception("File " . dirname(__FILE__) . '/' . self::$SCHEMA_DIR . '/' . $schemaName . '.json'." not found");

        $schema = json_decode( $schema, true );

        if ( is_null( $schema ) )
            throw new \Exception("Scheme is not in a valid JSON format");

        return $schema;
    }

    public static function check( string $schemaName, array $data ) {
        $schema = self::getSchema( $schemaName );
        $validator = new Validator();
        $validator->check( $data, $schema );

        if ( !$validator->isValid() ) {
            $errors = [];

            foreach ( $validator->getErrors() as $error )
                $errors[ $error['property'] ] = $error['message'];

            throw new SchemaException( $errors );
        }

        return true;
    }
}