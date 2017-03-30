<?php
use School\Controller\CourseController;
use School\Model\CourseModel;
use School\lib\DB;

try {
    $course_model = new CourseModel( DB::getConnection() );
    $course_controller = new CourseController( $course_model );
} catch ( mysqli_sql_exception $e ) {
    echo "Server is down";
    exit;
}

$app->group("/course", function() use ( $app, $course_controller ) {
    $app->get("", function() use ( $course_controller ) {
        echo json_encode( $course_controller->getCourses() );
    });

    $app->post("", function( $request, $response, $next ) use ( $course_controller ) {
        $data = json_decode(file_get_contents('php://input'), true);

        try {
            echo json_encode(["id" => $course_controller->createCourse( $data )]);
        } catch ( Throwable $e ) {
            echo $e->getMessage();
        }
    });

    $app->get("/{course_id}", function( $request, $response, $params ) use ( $app, $course_controller ) {
        echo json_encode( $course_controller->getCourse( $params['course_id'] ) );
    });
});