<?php
use School\lib\Login;

$app->group("/login", function() use ( $app, $user_controller ) {
    $app->post("", function( $request, $response, $next ) {
        $body = $request->getBody()->getContents();
        $body = json_decode( $body, true );
        $user_id = Login::authenticate( $body['username'], $body['password'] );

        if ( $user_id ) {
            echo 'success';
        } else {
            echo 'failed';
            $response->withStatus(401);
        }
    });
});