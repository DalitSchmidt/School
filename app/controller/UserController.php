<?php
namespace School\Controller;
use School\lib\SchemaException;
use School\Model\Model;
use School\lib\Schema;

class UserController extends Controller {
    private $schemaName = 'user';

    public function __construct( Model $model ) {
        parent::__construct( $model );
    }

    public function show() {
        return $this->model->getUsers();
    }

    public function fetch( int $user_id ) {
        return $this->model->getUser( $user_id );
    }

    /**
     * @param array $args
     * @return mixed
     */
    public function create( array $args ) {
        Schema::check( $this->schemaName, $args );
        $args['password'] = md5( $args['password'] );

        return $this->model->createUser( $args );
    }

    /**
     * @param int $user_id
     * @return bool
     */
    public function destroy( int $user_id ) : bool {
        return $this->model->deleteUser( $user_id );
    }

    /**
     * @param int $user_id
     * @param array $args
     * @return mixed
     */
    public function update( int $user_id, array $args ) {
        return $this->model->updateUser( $user_id, $args );
    }
}