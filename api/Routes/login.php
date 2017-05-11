<?php
@session_start();
use School\lib\Login;

$app->group("/login", function() use ( $app ) {
    $app->get("", function( $request, $response, $next ) {
//        $body = $request->getBody()->getContents();
//        $body = json_decode( $body, true );
        $username = $_GET['username'];
        $password = $_GET['password'];
        $user_id = Login::login( $username, $password );

        if ( $user_id ) {
            echo 'success';
        } else {
            echo 'failed';
            $response->withStatus(403);
        }
    });
});