<?php
use School\Controller\UserController;
use School\Model\UserModel;
use School\lib\DB;

try {
    $user_model = new UserModel( DB::getConnection() );
    $user_controller = new UserController( $user_model );
} catch ( mysqli_sql_exception $e ) {
    echo "Server is down";
    exit;
}

$app->group("/user", function() use ( $app, $user_controller ) {
    $app->get("", function() use ( $user_controller ) {
        echo json_encode( $user_controller->getUsers() );
    });

    $app->post("", function( $request, $response, $next ) use ( $user_controller ) {
        $data = json_decode(file_get_contents('php://input'), true);

        try {
            echo $user_controller->createUser( $data );
        } catch ( Throwable $e ) {
            echo $e->getMessage();
        }
    });
});