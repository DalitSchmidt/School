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
    $app->get("", function( $request, $response, $next ) use ( $user_controller ) {
        $users = $user_controller->getUsers();
        if ( sizeof ( $users ) == 0 )
            $response->withStatus( 204 );
        else
            echo json_encode( $users );
    });

    $app->post("", function( $request, $response, $next ) use ( $user_controller ) {
        $request_body = file_get_contents('php://input');
        $data = json_decode($request_body, true);

        try {
            var_dump( $user_controller->createUser( $data ) );
        } catch ( Throwable $e ) {
            echo $e->getMessage();
        }
    });
});