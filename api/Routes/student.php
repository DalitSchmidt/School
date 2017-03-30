<?php
use School\Controller\StudentController;
use School\Model\StudentModel;
use School\lib\DB;

try {
    $user_model = new StudentModel( DB::getConnection() );
    $student_controller = new StudentController( $user_model );
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
});