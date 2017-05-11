<?php
use School\Controller\StudentController;
use School\Model\StudentModel;
use School\lib\DB;

try {
    $student_model = new StudentModel( DB::getConnection() );
    $student_controller = new StudentController( $student_model );
} catch ( mysqli_sql_exception $e ) {
    echo "Server is down";
    exit;
}

$app->group("/student", function() use ( $app, $student_controller ) {
    $app->post("", function( $request, $response, $next ) use ( $student_controller ) {
        $request_body = file_get_contents('php://input');
        $data = json_decode($request_body, true);

        try {
            echo $student_controller->createStudent( $data );
        } catch ( Throwable $e ) {
            echo $e->getMessage();
        }
    });

    $app->get("", function( $request, $response, $next ) use ( $student_controller ) {

    });

    $app->get("/:student_id", function( $request, $response, $next ) use ( $student_controller ) {
        $request['student_id'];
    });

    $app->put("", function( $request, $response, $next ) use ( $student_controller ) {

    });

    $app->delete("", function( $request, $response, $next ) use ( $student_controller ) {

    });
});